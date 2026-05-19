<?php include 'includes/db.php'; ?>
<?php
    $total     = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tasks"));
    $completed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tasks WHERE status='Completed'"));
    $pending   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tasks WHERE status='Pending'"));
    $high      = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tasks WHERE priority='High' AND status='Pending'"));
    $percent   = $total > 0 ? round(($completed / $total) * 100) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="app-layout">

    <!-- ===== SIDEBAR ===== -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon"><i class="bi bi-check2-all"></i></div>
            <span class="brand-name">TaskFlow</span>
        </div>

        <div class="sidebar-section">
            <p class="sidebar-label">Overview</p>
            <div class="stat-row">
                <div class="stat-box">
                    <span class="stat-val"><?= $total ?></span>
                    <span class="stat-key">Total</span>
                </div>
                <div class="stat-box">
                    <span class="stat-val text-warning"><?= $pending ?></span>
                    <span class="stat-key">Pending</span>
                </div>
                <div class="stat-box">
                    <span class="stat-val text-success"><?= $completed ?></span>
                    <span class="stat-key">Done</span>
                </div>
            </div>
        </div>

        <div class="sidebar-section">
            <p class="sidebar-label">Progress</p>
            <div class="progress-wrap">
                <div class="progress-bar-bg">
                    <div class="progress-bar-fill" style="width:<?= $percent ?>%"></div>
                </div>
                <span class="progress-percent"><?= $percent ?>%</span>
            </div>
            <p class="progress-note"><?= $completed ?> of <?= $total ?> tasks completed</p>
        </div>

        <div class="sidebar-section">
            <p class="sidebar-label">Filter</p>
            <button class="sidebar-filter active" data-filter="all">
                <i class="bi bi-grid-3x3-gap-fill"></i> All Tasks
                <span class="filter-count"><?= $total ?></span>
            </button>
            <button class="sidebar-filter" data-filter="pending">
                <i class="bi bi-hourglass-split"></i> Pending
                <span class="filter-count"><?= $pending ?></span>
            </button>
            <button class="sidebar-filter" data-filter="completed">
                <i class="bi bi-check-circle-fill"></i> Completed
                <span class="filter-count"><?= $completed ?></span>
            </button>
        </div>

        <div class="sidebar-section">
            <p class="sidebar-label">Priority</p>
            <button class="sidebar-filter" data-priority="High">
                <span class="dot high"></span> High
                <span class="filter-count text-danger"><?= $high ?></span>
            </button>
            <button class="sidebar-filter" data-priority="Medium">
                <span class="dot medium"></span> Medium
            </button>
            <button class="sidebar-filter" data-priority="Low">
                <span class="dot low"></span> Low
            </button>
        </div>

        <div class="sidebar-bottom">
            <button class="dark-btn" id="darkToggle">
                <i class="bi bi-moon-stars-fill" id="darkIcon"></i>
                <span id="darkLabel">Dark Mode</span>
            </button>
        </div>
    </aside>

    <!-- ===== MAIN ===== -->
    <main class="main-area">

        <!-- TOP BAR -->
        <header class="top-bar">
            <div>
                <h1 class="page-title">My Tasks</h1>
                <p class="page-date" id="currentDate"></p>
            </div>
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" id="searchInput" placeholder="Search tasks...">
            </div>
        </header>

        <!-- ADD TASK CARD -->
        <div class="add-task-card">
            <form action="add_task.php" method="POST" class="add-form">
                <div class="add-input-wrap">
                    <i class="bi bi-plus-circle"></i>
                    <input type="text" name="task_name" placeholder="Add a new task..." required>
                </div>
                <div class="add-selects">
                    <select name="priority" class="add-select">
                        <option value="High">🔴 High</option>
                        <option value="Medium" selected>🟠 Medium</option>
                        <option value="Low">🟢 Low</option>
                    </select>
                    <select name="category" class="add-select">
                        <option value="Study">📚 Study</option>
                        <option value="Work">💼 Work</option>
                        <option value="Personal">👤 Personal</option>
                        <option value="General">📌 General</option>
                    </select>
                    <input type="date" name="due_date" class="add-select">
                    <button type="submit" class="add-btn">
                        <i class="bi bi-plus-lg"></i> Add Task
                    </button>
                </div>
            </form>
        </div>

        <!-- TASK LIST -->
        <div class="task-section">
            <div class="section-header">
                <span id="taskCountLabel">All Tasks (<?= $total ?>)</span>
            </div>

            <div id="taskList">
            <?php
                $result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY FIELD(priority,'High','Medium','Low'), created_at DESC");
                $count  = 0;
                while ($row = mysqli_fetch_assoc($result)):
                    $count++;
                    $p        = $row['priority'];
                    $s        = $row['status'];
                    $cat      = $row['category'] ?? 'General';
                    $due      = $row['due_date'];
                    $overdue  = $due && $due < date('Y-m-d') && $s != 'Completed';
                    $pClass   = strtolower($p);
                    $catIcons = ['Study'=>'📚','Work'=>'💼','Personal'=>'👤','General'=>'📌'];
                    $icon     = $catIcons[$cat] ?? '📌';
            ?>
                <div class="task-card <?= $s=='Completed' ? 'is-done' : '' ?>"
                     data-status="<?= strtolower($s) ?>"
                     data-priority="<?= $p ?>"
                     data-name="<?= htmlspecialchars(strtolower($row['task_name'])) ?>">

                    <div class="tc-left">
                        <div class="priority-dot <?= $pClass ?>"></div>
                        <div class="tc-check <?= $s=='Completed' ? 'checked' : '' ?>">
                            <?php if($s != 'Completed'): ?>
                            <a href="complete_task.php?id=<?= $row['id'] ?>" class="check-link" title="Mark complete">
                                <i class="bi bi-circle"></i>
                            </a>
                            <?php else: ?>
                            <span class="check-link done-check">
                                <i class="bi bi-check-circle-fill"></i>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="tc-body">
                        <p class="tc-name"><?= htmlspecialchars($row['task_name']) ?></p>
                        <div class="tc-tags">
                            <span class="tag priority-tag <?= $pClass ?>"><?= $p ?></span>
                            <span class="tag cat-tag"><?= $icon ?> <?= $cat ?></span>
                            <?php if($due): ?>
                            <span class="tag date-tag <?= $overdue ? 'overdue' : '' ?>">
                                <i class="bi bi-calendar3"></i>
                                <?= $overdue ? '⚠ ' : '' ?><?= date('M d, Y', strtotime($due)) ?>
                            </span>
                            <?php endif; ?>
                            <span class="tag date-tag">
                                <i class="bi bi-clock"></i> <?= date('M d', strtotime($row['created_at'])) ?>
                            </span>
                        </div>
                    </div>

                    <div class="tc-right">
                        <a href="delete_task.php?id=<?= $row['id'] ?>"
                           class="del-btn"
                           onclick="return confirm('Delete this task?')"
                           title="Delete">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php if($count === 0): ?>
                <div class="empty-state">
                    <i class="bi bi-clipboard2-check"></i>
                    <h6>No tasks yet</h6>
                    <p>Add your first task above to get started</p>
                </div>
            <?php endif; ?>
            </div>
        </div>

    </main>
</div>

<!-- TOAST -->
<?php if(isset($_GET['added'])): ?>
<div class="toast-box show" id="toast">
    <i class="bi bi-check-circle-fill"></i> Task added successfully!
</div>
<?php elseif(isset($_GET['deleted'])): ?>
<div class="toast-box show" id="toast">
    <i class="bi bi-trash3-fill"></i> Task deleted.
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="darkmode.js"></script>
<script>
// Date
document.getElementById('currentDate').textContent =
    new Date().toLocaleDateString('en-US',{weekday:'long',year:'numeric',month:'long',day:'numeric'});

// Search
document.getElementById('searchInput').addEventListener('input', function(){
    const q = this.value.toLowerCase();
    document.querySelectorAll('.task-card').forEach(card => {
        card.style.display = card.dataset.name.includes(q) ? 'flex' : 'none';
    });
});

// Filter by status
document.querySelectorAll('[data-filter]').forEach(btn => {
    btn.addEventListener('click', function(){
        document.querySelectorAll('[data-filter]').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const f = this.dataset.filter;
        document.querySelectorAll('.task-card').forEach(card => {
            card.style.display = (f === 'all' || card.dataset.status === f) ? 'flex' : 'none';
        });
        document.getElementById('taskCountLabel').textContent =
            f.charAt(0).toUpperCase() + f.slice(1) + ' Tasks';
    });
});

// Filter by priority
document.querySelectorAll('[data-priority]').forEach(btn => {
    btn.addEventListener('click', function(){
        document.querySelectorAll('[data-filter]').forEach(b => b.classList.remove('active'));
        const p = this.dataset.priority;
        document.querySelectorAll('.task-card').forEach(card => {
            card.style.display = card.dataset.priority === p ? 'flex' : 'none';
        });
        document.getElementById('taskCountLabel').textContent = p + ' Priority Tasks';
    });
});

// Toast auto hide
setTimeout(() => {
    const t = document.getElementById('toast');
    if(t) { t.style.opacity = '0'; t.style.transform = 'translateY(20px)'; }
}, 3000);
</script>
</body>
</html>