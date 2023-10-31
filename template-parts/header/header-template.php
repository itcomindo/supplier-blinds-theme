<?php

/**
 * File header-template.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
defined('ABSPATH') || exit;



if (!is_front_page() || !is_home()) {
?>
    <div id="topbar" class="section">
        <div class="container h100">
            <div id="topbar-wr" class="hw100">
                <div id="topbar-left" class="topbar-col hw100"><span>Supplier Tirai (Roller Blinds)</span></div>
                <div id="topbar-right" class="topbar-col hw100"><span>0813-9891-2341</span></div>
            </div>
        </div>
    </div>

    <header id="header" class="section nonfp">
        <div class="container h100">
            <div id="header-wr" class="hw100">
                <div id="header-left" class="hw100 header-col">
                    <h2 id="header-logo"><a href="/" id="header-logo-link" title="Supplier Tirai Roller Blinds">SupplierBlinds</a></h2>
                </div>
                <div id="header-right" class="hw100 header-col">
                    <nav id="header-menu">
                        <ul id="header-menu-item-wr">
                            <li class="header-menu-item"><a href="/">Homes</a></li>
                            <li class="header-menu-item"><a href="/#about">About</a></li>
                            <li class="fcont-trigger header-menu-item">Contacts</li>
                        </ul>
                    </nav>
                    <div id="prod-menu-trigger" class="prod-menu-trigger">
                        <i class="fas fa-bars"></i>
                        <span>Product</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="catmenu" class="section">
        <div class="container h100">
            <?php mm_show_category_menu('fpc'); ?>
        </div>
    </div>




<?php
} else {
?>
    <header id="header" class="section">
        <div class="container h100">
            <div id="header-wr" class="hw100">
                <div id="header-left" class="hw100 header-col">
                    <h2 id="header-logo"><a href="/" id="header-logo-link" title="Supplier Tirai Roller Blinds">SupplierBlinds</a></h2>
                </div>
                <div id="header-right" class="hw100 header-col">
                    <nav id="header-menu">
                        <ul id="header-menu-item-wr">
                            <li class="header-menu-item"><a href="/">Home</a></li>
                            <li class="header-menu-item"><a href="/#about">About</a></li>
                            <li class="fcont-trigger header-menu-item">Contacts</li>
                        </ul>
                    </nav>
                    <div id="prod-menu-trigger" class="prod-menu-trigger">
                        <i class="fas fa-bars"></i>
                        <span>Product</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php
}

?>