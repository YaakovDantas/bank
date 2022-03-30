<template>
  <div id="home-page">
    <a-layout id="components-layout-demo-top" class="layout">
      <a-layout-header class="header">
        <div class="logo font-blue" :style="{ fontSize: '18px' }">
          <div>
            :D
          </div>
        </div>
        <a-menu
          mode="horizontal"
          :default-selected-keys="['2']"
          :style="{ lineHeight: '64px' }"
          class="font-black"
        >
          <a-menu-item key="1"> Minha conta </a-menu-item>
          <a-menu-item key="2" :disabled="true"> Investimentos </a-menu-item>
          <a-menu-item key="3" :disabled="true"> Empréstimos </a-menu-item>
        </a-menu>
      </a-layout-header>
      <a-layout-content style="padding: 0 50px">
        <div
          :style="{
            background: 'transparent',
            padding: '14px',
            minHeight: '80vh',
          }"
        >
          <div class="header-content">
            <my-profile />
          </div>
          <div class="body-content">
            <list-account />
          </div>
        </div>
      </a-layout-content>
      <a-layout-footer style="text-align: center">
        ©2022 Desenvolvido por Thiago Yaakov Dantas.
      </a-layout-footer>
    </a-layout>
  </div>
</template>

<script>
import ListAccount from ".//ListAccount";
import MyProfile from "./MyProfile.vue";
// @ is an alias to /src

export default {
  name: "Home",
  components: {
    ListAccount,
    MyProfile,
  },
};
</script>

<style lang="scss">
#home-page {
  .header {
    background: #fff;
    .ant-menu {
      color: #1a1919;
    }
  }
  #components-layout-demo-top .logo {
    width: 120px;
    display: flex;
    height: 31px;
    margin: 16px 24px 16px 0;
    float: left;
    justify-content: center;
    align-items: center;
  }
}
</style>
