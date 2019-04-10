<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="feed" role="tabpanel" aria-labelledby="feed-tab">...1</div>
  <div class="tab-pane fade" id="person" role="tabpanel" aria-labelledby="person-tab">...2</div>
  <div class="tab-pane fade" id="messenger" role="tabpanel" aria-labelledby="messenger-tab">...3</div>
  <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">...4</div>
  <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab">...5</div>

  <!-- NAV PROFILE -->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <ul class="list-unstyled m-0">
          <li class="p-2"><a href="<?php echo BASE_URL; ?>profile" class="d-flex align-items-center"><div><img class="img-responsive user-avatar mr-2" src="<?php echo BASE_URL; ?>assets/img/avatar/<?php echo $user['avatar']; ?>" alt=""></div><?php echo !empty($user['name']) ? $user['name'] : ''; ?></a></li>
          <h3 class="p-2 w-100 mb-0">SUGESTÕES</h3>
          <li class="p-2">...</li>
          <h3 class="p-2 w-100 mb-0">FAVORITOS</h3>
          <li class="p-2">...</li>
          <h3 class="p-2 w-100 mb-0">APLICATIVOS</h3>
          <li class="p-2">...</li>
          <h3 class="p-2 w-100 mb-0">GRUPOS</h3>
          <li class="p-2">...</li>
          <h3 class="p-2 w-100 mb-0">AMIGOS</h3>
          <li class="p-2">...</li>
          <h3 class="p-2 w-100 mb-0">PÁGINAS</h3>
          <li class="p-2">...</li>
          <h3 class="p-2 w-100 mb-0">AJUDA E CONFIGURAÇÕES</h3>
          <li class="p-2"><a href="<?php echo BASE_URL; ?>login/logout" class="d-flex align-items-center"><i class="icon-logout"></i><span class="ml-1">Sair</span></a></li>
      </ul>
      <div class="p-3">
          <p class="mb-0">Português (Brasil)</p>
          <strong>Facebook @2018</strong>
      </div>
  </div>
  <!-- NAV PROFILE -->

</div>