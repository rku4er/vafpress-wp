<?php
    use Roots\Sage\Titles;

    $show_title = vp_metabox('page_options.show_title');
    $title_options = vp_metabox('page_options.title_options.0');
    $layout_class = ($title_options['title_layout'] === 'fluid') ? 'container-fluid' : 'container';
?>

<?php if($show_title): ?>
<div class="page-header row">
    <div class="<?php echo $layout_class ?>">
        <h1> <?php echo Titles\title(); ?> </h1>
    </div>
</div>
<?php endif; ?>

