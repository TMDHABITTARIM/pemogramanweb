<template>
  <div>
    <nav class="navbar">
      <router-link :to="{ name: 'home' }" class="navbar-brand">TransCopy</router-link>
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link :to="{ name: 'home' }" class="nav-link" exact-active-class="active">HOME</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'percetakan.index' }" class="nav-link" exact-active-class="active">PERCETAKAN</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'product.index' }" class="nav-link" exact-active-class="active">PRODUCT</router-link>
        </li>
      </ul>
    </nav>
    <router-view></router-view>
  </div>
</template>
