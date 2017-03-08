<div id="search-form-wrapper">

  <form action="<?php echo url_for(array('module' => 'informationobject', 'action' => 'browse')) ?>" data-autocomplete="<?php echo url_for(array('module' => 'search', 'action' => 'autocomplete')) ?>" autocomplete="off">

    <input type="hidden" name="topLod" value="0"/>

    <?php if (isset($repository)): ?>
      <input type="text" name="query"<?php if (isset($sf_request->query)) echo ' class="focused"' ?> value="<?php echo $sf_request->query ?>" placeholder="<?php echo __('Search %1%', array('%1%' => render_title($repository))) ?>"/>
    <?php else: ?>
      <input type="text" name="query"<?php if (isset($sf_request->query)) echo ' class="focused"' ?> value="<?php echo $sf_request->query ?>" placeholder="<?php echo __('Search') ?>"/>
    <?php endif; ?>

    <button class="btn">
      <span class="caret"></span>
    </button>

    <div id="search-realm" class="search-popover">

      <?php if (sfConfig::get('app_multi_repository')): ?>

        <div>
          <label>
            <?php if (isset($repository)): ?>
              <input name="repos" type="radio" value data-placeholder="<?php echo __('Search') ?>">
            <?php else: ?>
              <input name="repos" type="radio" value checked="checked" data-placeholder="<?php echo __('Search') ?>">
            <?php endif; ?>
            <?php echo __('Global search') ?>
          </label>
        </div>

        <?php if (isset($repository)): ?>
          <div>
            <label>
              <input name="repos" checked="checked" type="radio" value="<?php echo $repository->id ?>"/>
              <?php echo __('Search <span>%1%</span>', array('%1%' => render_title($repository))) ?>
            </label>
          </div>
        <?php endif; ?>

        <?php if (isset($altRepository)): ?>
          <div>
            <label>
              <input name="repos" type="radio" value="<?php echo $altRepository->id ?>"/>
              <?php echo __('Search <span>%1%</span>', array('%1%' => render_title($altRepository))) ?>
            </label>
          </div>
        <?php endif; ?>

      <?php endif; ?>

      <?php /* Rather than have the link pop up when search box is pressed, have it just show by default
      <div class="search-realm-advanced">
        <a href="<?php echo url_for(array('module' => 'informationobject', 'action' => 'browse', 'showAdvanced' => true, 'topLod' => false)) ?>">
          <?php echo __('Advanced search') ?>&nbsp;&raquo;
        </a>
      </div>
      */ ?>

    </div>

  </form>

  <p class="advanced-search-link">
    <a href="<?php echo url_for(array('module' => 'informationobject', 'action' => 'browse', 'showAdvanced' => true, 'topLod' => false)) ?>">
      <?php echo __('Advanced search') ?>
    </a>
  </p>
</div>
