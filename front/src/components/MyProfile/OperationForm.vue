<template>
  <a-form-model
    ref="ruleForm"
    :model="form"
    :rules="rules"
    :label-col="labelCol"
    :wrapper-col="wrapperCol"
    id="form-operation"
  >
    <a-form-model-item ref="account_number" prop="account_number">
      <p class="title-section">Número da conta</p>
      <a-input-number
        class="input-number"
        :style="{ minWidth: '100%' }"
        v-model="form.account_number"
        @blur="
          () => {
            $refs.account_number.onFieldBlur();
          }
        "
      />
    </a-form-model-item>

    <a-form-model-item ref="agency" prop="agency">
      <p class="title-section">Agência</p>
      <a-input
        v-model.trim="form.agency"
        @blur="
          () => {
            $refs.agency.onFieldBlur();
          }
        "
      />
    </a-form-model-item>
    <a-form-model-item ref="account_code" prop="account_code">
      <p class="title-section">Código de segurança</p>
      <a-input
        v-model.trim="form.account_code"
        @blur="
          () => {
            $refs.account_code.onFieldBlur();
          }
        "
      />
    </a-form-model-item>
    <a-form-model-item ref="amount" prop="amount">
      <p class="title-section">Valor</p>
      <a-input-number
        type="number"
        :min=0
        :style="{ minWidth: '100%' }"
        v-model="form.amount"
      />
    </a-form-model-item>
    <a-form-model-item
      ref="password"
      prop="password"
      v-if="operationType === 'draft'"
    >
      <p class="title-section">Senha</p>
      <a-input-password
        v-model.trim="form.password"
        type="password"
        @blur="
          () => {
            $refs.password.onFieldBlur();
          }
        "
      />
    </a-form-model-item>
    <a-form-model-item :wrapper-col="{ span: 24, offset: 0 }">
      <a-button class="btn-enter" @click="onSubmit"> Enviar </a-button>
      <a-popconfirm
        title="Tem certeza disso?"
        ok-text="Sim"
        cancel-text="Não"
        @confirm="resetForm"
        @cancel="() => {}"
      >
        <a-button style="margin-left: 10px"> Cancelar </a-button>
      </a-popconfirm>
    </a-form-model-item>
  </a-form-model>
</template>
<script>
export default {
  props: {
    handleSendOperation: {
      type: Function,
      required: true,
      default: () => {},
    },
    handleCancelOperation: {
      type: Function,
      required: true,
      default: () => {},
    },
    operationType: {
      type: String,
      required: true,
      default: null,
    },
  },

  data() {
    let ruler_default = [
      {
        required: true,
        message: "Preencha o campo acima",
        trigger: "blur",
      },
    ];
    return {
      labelCol: { span: 1 },
      wrapperCol: { span: 24 },
      other: "",
      form: {
        account_number: undefined,
        account_code: undefined,
        agency: undefined,
        amount: undefined,
        password: "",
      },
      rules: {
        account_number: [
          {
            type: "number",
            required: true,
            message: "Preencha o campo acima",
            trigger: "blur",
          },
        ],
        account_code: ruler_default,
        agency: ruler_default,
        password: ruler_default,
        amount: [
          {
            type: "number",
            required: true,
            message: "Preencha o campo acima",
            trigger: "blur",
          },
        ],
      },
    };
  },
  methods: {
    onSubmit() {
      this.$refs.ruleForm.validate((valid) => {
        if (valid) {
          if (this.operationType === "deposit") {
            delete this.form.password;
          }
          let data = { ...this.form, type: this.operationType };
          this.handleSendOperation(data);
          this.$refs.ruleForm.resetFields();
        } else {
          return false;
        }
      });
    },
    resetForm() {
      this.$refs.ruleForm.resetFields();
      this.$message.info("Operação cancelada");
      this.handleCancelOperation();
    },
  },
};
</script>

<style lang="scss" scoped>
.title-section {
  margin: 0;
}
</style>
<style lang="scss">
#form-operation {
  .ant-input-number-handler-wrap {
    display: none;
  }
}
</style>
