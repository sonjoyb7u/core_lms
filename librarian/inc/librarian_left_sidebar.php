<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->
    <!-- ========================================================= -->
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">
                    <!--HOME-->
                    <li class="<?= $page == 'index.php' ? 'active-item' : '' ?>"><a href="./index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>

                    <li class="<?= $page == 'students.php' ? 'active-item' : '' ?>">
                        <a href="./students.php">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>All Students List</span>
                        </a>
                    </li>

                    <li class="has-child-item close-item <?= $page == 'add_book.php' ? 'open-item' : '' ?><?= $page == 'manage_books.php' ? 'open-item' : '' ?>">
                        <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a>
                        <ul class="nav child-nav level-1">
                            <li class="<?= $page == 'add_book.php' ? 'active-item' : '' ?>"><a href="./add_book.php">Add Book</a></li>
                            <li class="<?= $page == 'manage_books.php' ? 'active-item' : '' ?>"><a href="./manage_books.php">Manage Books</a></li>
                        </ul>
                    </li>

                    <li class="<?= $page == 'book_issue.php' ? 'active-item' : '' ?>"><a href="./book_issue.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>
                    <li class="<?= $page == 'return_book.php' ? 'active-item' : '' ?>"><a href="./return_book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>