<template>
  <div id="view-data-component" class="card-content">
    <a-page-header sub-title="Informações da conta">
      <template slot="extra">
        <a-statistic title="Saldo" prefix="R$" :value="balanceAccount" />
      </template>
      <div class="content" style="text-align: left">
        <div class="main">
          <a-descriptions size="small" :column="1">
            <a-descriptions-item>
              <h1 class="name">
                <strong>{{ userData.name }}</strong>
              </h1>
            </a-descriptions-item>
            <a-descriptions-item label="Número da conta">
              <p class="account-number">
                {{ userData.account_number }}
              </p>
            </a-descriptions-item>
            <a-descriptions-item label="Agência">
              <p class="agency">
                {{ userData.agency }}
              </p>
            </a-descriptions-item>
          </a-descriptions>
        </div>
        <div class="extra">
          <div
            :style="{
              display: 'flex',
              width: 'max-content',
              justifyContent: 'flex-end',
              gap: '10px',
            }"
            class="btn-actions"
          >
            <a-button
              key="1"
              @click="handleOperation('deposit')"
              class="btn-enter"
            >
              Depositar
            </a-button>
            <a-button
              key="2"
              @click="handleOperation('draft')"
              class="btn-cancel"
            >
              Sacar
            </a-button>
          </div>
        </div>
      </div>
    </a-page-header>
  </div>
</template>
<script>
export default {
  name: "view-data",

  props: {
    dataObject: {
      type: Object,
      required: false,
      default: () => {
        return {
          name: "Nome do Cliente",
          account_number: "xxx.xxx.xxx-xx",
          agency: "xxx-xx",
          balance: 0,
        };
      },
    },
    handleOperation: {
      type: Function,
      required: true,
      default: () => {},
    },
  },

  data() {
    return {};
  },

  computed: {
    userData() {
      return (
        this.$store.state.user_data || {
          name: "Nome do Cliente",
          account_number: "xxx.xxx.xxx-xx",
          agency: "xxx-xx",
        }
      );
    },
    balanceAccount() {
      return this.$store.state.balance || 0;
    },
  },
};
</script>
<style lang="scss">
#view-data-component {
  tr:last-child td {
    padding-bottom: 0;
  }
  .content {
    display: flex;
  }
  .ant-statistic-content {
    font-size: 20px;
    line-height: 28px;
  }

  .extra {
    display: flex;
    align-items: flex-end;
    .btn-actions {
      @media screen and (max-width: 500px) {
        flex-direction: column;
      }
    }
  }

  @media (max-width: 576px) {
    .content {
      display: block;
    }

    .main {
      width: 100%;
      margin-bottom: 12px;
    }

    .extra {
      width: 100%;
      margin-left: 0;
      text-align: left;
    }
  }
}
</style>
