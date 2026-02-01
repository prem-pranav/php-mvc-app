<?php
/**
 * =============================================================================
 * File Name   : Database.php
 * Description : PDO-based database module for CRUD operations, supporting
 *               flexible queries and safe prepared statements.
 * =============================================================================
 */

class Database {

    /** @var Database|null $instance Singleton instance */
    private static $instance = null;

    /** @var PDO $pdo PDO instance */
    private $pdo;

    private $error;

    /**
     * Private constructor to establish PDO connection.
     */
    private function __construct() {
        // Use constants from config.php: DB_HOST, DB_NAME, DB_USER, DB_PASS
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            die("Database connection failed: " . $this->error);
        }
    }

    /**
     * Get the singleton instance of Database.
     *
     * @return Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Execute a SELECT query and return all matching rows.
     */
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Execute a SELECT query and return a single row.
     */
    public function selectOne($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * Execute a non-SELECT SQL statement (INSERT, UPDATE, DELETE).
     */
    public function execute($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Get the ID of the last inserted row.
     */
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    /**
     * Insert a new record into a table.
     */
    public function create($table, $data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $this->execute($sql, array_values($data));
        return $this->lastInsertId();
    }

    /**
     * Fetch records from a table with advanced filtering.
     */
    public function read(
                        $table,
                        $conditions = [],
                        $columns = "*",
                        $search = [],
                        $limit = null,
                        $offset = 0,
                        $orderBy = null,
                        $between = [],
                        $whereIn = []
                    ) {
        $sql = "SELECT {$columns} FROM {$table}";
        $params = [];
        $clauses = [];

        // Exact match conditions
        if (!empty($conditions)) {
            foreach ($conditions as $col => $val) {
                $clauses[] = "{$col} = ?";
                $params[] = $val;
            }
        }

        // Search (LIKE queries)
        if (!empty($search)) {
            $searchClauses = [];
            foreach ($search as $col => $val) {
                $searchClauses[] = "{$col} LIKE ?";
                $params[] = "%" . $val . "%";
            }
            $clauses[] = "(" . implode(" OR ", $searchClauses) . ")";
        }

        // BETWEEN condition
        if (!empty($between)) {
            foreach ($between as $col => $range) {
                $clauses[] = "STR_TO_DATE({$col},'%Y-%m-%d') BETWEEN ? AND ?";
                $params[] = $range[0]; 
                $params[] = $range[1]; 
            }
        }

        // WHERE IN condition
        if (!empty($whereIn)) {
            foreach ($whereIn as $col => $values) {
                if (is_array($values) && count($values) > 0) {
                    $placeholders = implode(',', array_fill(0, count($values), '?'));
                    $clauses[] = "{$col} IN ({$placeholders})";
                    foreach ($values as $val) {
                        $params[] = $val;
                    }
                }
            }
        }

        // Build WHERE clause
        if (!empty($clauses)) {
            $sql .= " WHERE " . implode(" AND ", $clauses);
        }

        // ORDER BY
        if ($orderBy) {
            $sql .= " ORDER BY " . $orderBy;
        }

        // Pagination
        if ($limit !== null) {
            $sql .= " LIMIT ? OFFSET ?";
            $params[] = (int) $limit;
            $params[] = (int) $offset;
        }

        return $this->query($sql, $params);
    }

    /**
     * Update records in a table.
     */
    public function update($table, $data, $conditions) {
        $setClauses = [];
        $params = [];

        foreach ($data as $col => $val) {
            $setClauses[] = "{$col} = ?";
            $params[] = $val;
        }

        $sql = "UPDATE {$table} SET " . implode(", ", $setClauses);

        if (!empty($conditions)) {
            $clauses = [];
            foreach ($conditions as $col => $val) {
                $clauses[] = "{$col} = ?";
                $params[] = $val;
            }
            $sql .= " WHERE " . implode(" AND ", $clauses);
        }

        return $this->execute($sql, $params);
    }

    /**
     * Delete records from a table.
     */
    public function delete($table, $conditions) {
        $sql = "DELETE FROM {$table}";
        $params = [];

        if (!empty($conditions)) {
            $clauses = [];
            foreach ($conditions as $col => $val) {
                $clauses[] = "{$col} = ?";
                $params[] = $val;
            }
            $sql .= " WHERE " . implode(" AND ", $clauses);
        }

        return $this->execute($sql, $params);
    }
}
