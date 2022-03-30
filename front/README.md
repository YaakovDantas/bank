# Banco Yaakov

## Instalação e configuração
```
1. Faça um clone desse repositório;
2. Acesse a raiz do projeto `cd front`;
4. De preferencia use o `yarn`, instale seguindo [link](https://yarnpkg.com/getting-started/install);
5. Rode `yarn` para instalar as depenências;
```

## Configuração

Copiar a estrutura dos arquivo exemplo de váriáveis de ambiente

```
cp .env.example .env
```

### Compile com 'hot-reload' em desenvolvimento
```
6. Rode `yarn serve` para iniciar o servidor
```

### Compilar e minificar para produção
```
Rode `yarn build`
```

### Listar e corrigir arquivos
```
Rode `yarn lint`
```

## Estrutura de pastas


└── public
└── src
    ├── assets/ # itens, imagens e icones usados na aplicação
    ├── components/ # componentes compartilháveis em toda aplicação
    ├── router/ # configurações das rotas
    ├── services/ # configuração de serviços utilizados
    ├── store # configuração e dispatch das ações do Redux 
    ├── styles/ # variáveis de configurações
    ├── views/ # páginas da aplicação


## Variáveis de ambiente:


VUE_APP_API_SERVER=http://127.0.0.1:8000/api


### Descrição das variáveis:

`VUE_APP_API_SERVER`= informar url do back-end