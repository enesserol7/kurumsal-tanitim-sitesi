<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/head"); ?>
</head>
<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <?php $this->load->view("includes/navbar"); ?>
    <?php $this->load->view("includes/aside"); ?>
    <?php $this->load->view("includes/navbar-search"); ?>
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
            </section>
        </div>
        <?php $this->load->view("includes/footer"); ?>
    </main>
    <?php $this->load->view("includes/include_script"); ?>
</body>
</html>