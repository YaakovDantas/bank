<template>
  <div id="my-profile">
    <view-data :handleOperation="callOperation" />
    <a-modal v-model="visible" :title="titleOperation" :footer="null">
      <operation-form
        :operationType="operationType"
        :handleSendOperation="sendOperation"
        :handleCancelOperation="() => (visible = false)"
      />
    </a-modal>
  </div>
</template>

<script>
import OperationForm from "../components/MyProfile/OperationForm.vue";
import ViewData from "../components/MyProfile/ViewData.vue";

export default {
  components: {
    ViewData,
    OperationForm,
  },

  data() {
    return {
      visible: false,
      titleOperation: "Depositar",
      operationType: "",
    };
  },

  mounted() {
    this.$store.dispatch("getBalanceUser", {
      ...this.$store.state.user_data,
    });
  },

  methods: {
    callOperation(operation) {
      this.titleOperation = operation === "draft" ? "Sacar" : "Depositar";
      this.visible = true;
      this.operationType = operation;
    },
    async sendOperation(data) {
      let response = await this.$store.dispatch("sendTransaction", data);
      if (!response.erro) {
        this.$message.success("Transação efetuada com sucesso.");
      } else {
        let message = this.logErrors(response.erro);
        this.$message.error(message);
      }
      this.visible = false;
    },

    logErrors(log) {
      switch (log) {
        case "Invalid account information.":
          return "Conta inválida!";
        case "Insufficient balance to complete this transaction.":
          return "Saldo insuficiente!";
        default:
          return "Transação não pode ser efetuada.";
      }
    },
  },
};
</script>

<style lang="scss">
#my-profile {
}
</style>
