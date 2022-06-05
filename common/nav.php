<?php
    session_start();
    ?>
<nav>
    <ul>
        <li class="nav-list-item">
            <a class="nav-item grayed" href="/">Home</a>
        </li>
        <li class="nav-list-item">
            <a class="nav-item grayed" href="/admin">Admin</a>
        </li>
        <?php
            if($_SESSION['id'] ){
                echo <<<_END
                    <li class="nav-list-item">
                        <a class="nav-item grayed" href="/logout">Logout</a>
                    </li>
                _END;
            }
        ?>
    </ul>
</nav>
<hr />
