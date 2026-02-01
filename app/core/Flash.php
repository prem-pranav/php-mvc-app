<?php
/**
 * ============================================================================
 * File: Flash.php
 * Description: Simple session-based flash message helper. Use
 *              `Flash::set($type, $message)` to queue UI messages and
 *              `Flash::display()` in views to render and clear them.
 * ============================================================================
 */

class Flash {
    /**
     * Set a flash message.
     * 
     * @param string $type The type of message (success, error, warning, info)
     * @param string $message The message text to display
     */
    public static function set($type, $message) {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }
        $_SESSION['flash'][$type][] = $message;
    }

    /**
     * Display all queued flash messages and clear the session storage.
     */
    public static function display() {
        if (!empty($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $type => $messages) {
                foreach ($messages as $msg) {
                    $icon = match ($type) {
                        'success' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>',
                        'error'   => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill me-2" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>',
                        'warning' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>',
                        'info'    => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill me-2" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>',
                        default   => ''
                    };

                    $bootstrapClass = match ($type) {
                        'success' => 'alert-success',
                        'error'   => 'alert-danger',
                        'warning' => 'alert-warning',
                        'info'    => 'alert-info',
                        default   => 'alert-secondary'
                    };
                    
                    echo "<div class='alert {$bootstrapClass} alert-dismissible fade show d-flex align-items-center shadow-sm border-0 mb-4' role='alert' style='border-radius: 12px; padding: 1rem 1.5rem;'>
                            <div class='flex-shrink-0'>{$icon}</div>
                            <div class='flex-grow-1 mx-2 fw-medium'>
                                {$msg}
                            </div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' style='padding: 1.25rem;'></button>
                          </div>";
                }
            }
            unset($_SESSION['flash']); // Clear after displaying
        }
    }
}
