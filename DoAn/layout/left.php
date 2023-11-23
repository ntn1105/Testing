
<?php
$category=CategoryDB::getCategories();
?>
<!-- <h5>Menu</h5>
<a class="text-muted" href="<?php echo Helper:: get_url('.'); ?>">Home</a>
<ul>
    <?php
     if(!empty($category)):
 foreach($category as $dm):
    ?>
    <li>
    <a class="text-muted" href="<?php echo Helper:: get_url('?c=listcat&id=' . $dm->getId()); ?>"><?php echo $dm->getName(); ?></a>
    </li>
    <?php  endforeach; endif;?>
</ul> -->

<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
                <?php
                    if(!empty($category)):
                     foreach($category as $dm):?>
					<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-1"><span></span><a class="text-muted" href="<?php echo Helper:: get_url('?c=listcat&id=' . $dm->getId()); ?>"><?php echo $dm->getName(); ?></a></label></li>
					<?php  endforeach; endif;?>
					
				</ul>
			</div>
            <script type="text/javascript">
        jQuery(document).ready(function($) {
            var $filter = $('.css-treeview');
            var $filterSpacer = $('', {
                "class": "vnkings-spacer",
                "height": $filter.outerHeight()
            });
            if ($filter.size())
            {
                $(window).scroll(function ()
                {
                    if (!$filter.hasClass('fix') && $(window).scrollTop() > $filter.offset().top)
                    {
                        $filter.before($filterSpacer);
                        $filter.addClass("fix");
                    }
                    else if ($filter.hasClass('fix')  && $(window).scrollTop() < $filterSpacer.offset().top)
                    {
                        $filter.removeClass("fix");
                        $filterSpacer.remove();
                    }
                });
            }
 
        });
    </script>

