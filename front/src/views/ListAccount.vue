<template>
  <div id="list-account" class="card-content">
    <h1 :style="{ textAlign: 'left', paddingLeft: '30px' }">Transações</h1>
    <a-list
      class="demo-loadmore-list"
      :loading="loading"
      item-layout="horizontal"
      :data-source="getData"
    >
      <div
        v-if="showLoadingMore"
        slot="loadMore"
        :style="{
          textAlign: 'center',
          marginTop: '12px',
          height: '32px',
          lineHeight: '32px',
        }"
      >
        <a-spin v-if="loadingMore" />
      </div>
      <a-list-item slot="renderItem" slot-scope="item, index">
        <div class="content-item" :key="index">
          <p>
            <a-icon type="clock-circle" />{{ " " }}
            <strong>{{ item.created_at | getHours }}</strong>
          </p>
          <p
            :style="{
              display: 'flex',
              justifyContent: 'left',
              minWidth: '80px',
              gap: '10px',
            }"
          >
            <strong>
              <a-icon type="plus" v-if="item.type === 'DEPOSIT'" />
              <a-icon type="minus" v-else />
            </strong>
            {{ item.type === "DRAFT" ? "saque" : "depósito" }}
          </p>
          <p><strong>R$ </strong> {{ item.amount }}</p>
        </div>
      </a-list-item>
    </a-list>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: true,
      loadingMore: false,
      showLoadingMore: true,
      data: [],
    };
  },
  mounted() {
    this.$store
      .dispatch("getHistoric", {
        account_number: "111",
        account_code: "22",
        agency: "333",
      })
      .then(() => {
        this.loading = false;
      });
    setTimeout(() => {
      this.loading = false;
    }, 5000);
  },

  computed: {
    getData() {
      return this.$store.state.historic.data || [];
    },
  },

  filters: {
    getHours(val) {
      return new Date(val).toLocaleString("pt");
    },
  },

  methods: {
    onLoadMore() {
      this.loadingMore = true;
      this.getData((res) => {
        this.data = this.data.concat(res.results);
        this.loadingMore = false;
        this.$nextTick(() => {
          window.dispatchEvent(new Event("resize"));
        });
      });
    },
  },
};
</script>

<style lang="scss">
#list-account {
  margin: 50px 0;
  .demo-loadmore-list {
    min-height: 350px;
    max-height: 600px;
    overflow-y: auto;
    .content-item {
      display: flex;
      gap: 10px 50px;
      flex-wrap: wrap;
      width: 100%;
      justify-content: space-around;
    }
  }
}
</style>
