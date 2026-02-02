(function(){
    const sidebar = document.querySelector('.sidebar');
    const toggle = document.getElementById('sidebarToggle');
    const body = document.body;
    if (!sidebar || !toggle) return;

    const mq = window.matchMedia('(max-width: 900px)');
    function isMobile(){ return mq.matches; }

    // Restore collapsed state on desktop
    const collapsed = localStorage.getItem('adminSidebarCollapsed') === 'true';
    if (collapsed && !isMobile()){
        sidebar.classList.add('collapsed');
    }

    toggle.addEventListener('click', (e)=>{
        e.stopPropagation();
        if (isMobile()){
            body.classList.toggle('sidebar-open');
        } else {
            sidebar.classList.toggle('collapsed');
            localStorage.setItem('adminSidebarCollapsed', sidebar.classList.contains('collapsed'));
        }
    });

    // Close mobile sidebar when clicking outside
    document.addEventListener('click', (e)=>{
        if (body.classList.contains('sidebar-open')){
            if (!sidebar.contains(e.target) && !toggle.contains(e.target)){
                body.classList.remove('sidebar-open');
            }
        }
    });

    // Hide overlay and ensure proper state on resize
    window.addEventListener('resize', ()=>{
        if (!isMobile()){
            body.classList.remove('sidebar-open');
            // re-apply collapsed state from storage
            const collapsedNow = localStorage.getItem('adminSidebarCollapsed') === 'true';
            if (collapsedNow) sidebar.classList.add('collapsed');
            else sidebar.classList.remove('collapsed');
        }
    });
})();
