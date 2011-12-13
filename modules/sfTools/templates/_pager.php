<?php if ($pager->getNbResults() > 0): ?>
  <table border="1">
    <tr>
      <th>Id</th>
      <th>Value</th>
    </tr>
    <?php foreach ($pager as $result): ?>
      <tr>
        <td><?php echo $result; ?></td>
        <td><?php echo rand(1, 103); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
      <a href="<?php echo url_for('sfTools/index?page=1') ?>">
        <img src="/sfDoctrinePlugin/images/first.png" alt="First page" title="First page" />
      </a>

      <a href="<?php echo url_for('sfTools/index?page='. $pager->getPreviousPage()) ?>">
        <img src="/sfDoctrinePlugin//images/previous.png" alt="Previous page" title="Previous page" />
      </a>

      <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getPage()): ?>
          <?php echo $page ?>
        <?php else: ?>
          <a href="<?php echo url_for('sfTools/index?page='. $page); ?>"><?php echo $page ?></a>
        <?php endif; ?>
      <?php endforeach; ?>

      <a href="<?php echo url_for('sfTools/index?page='. $pager->getNextPage()) ?>">
        <img src="/sfDoctrinePlugin/images/next.png" alt="Next page" title="Next page" />
      </a>

      <a href="<?php echo url_for('sfTools/index?page='. $pager->getLastPage()) ?>">
        <img src="/sfDoctrinePlugin/images/last.png" alt="Last page" title="Last page" />
      </a>
    </div>
  <?php endif; ?>

  <div class="pagination_desc">
    <strong><?php echo count($pager) ?></strong> Bookmarks
    <?php if ($pager->haveToPaginate()): ?>
      - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
  </div>

<?php else: ?>
  <h3><?php echo __('No result !'); ?></h3>
<?php endif; ?>