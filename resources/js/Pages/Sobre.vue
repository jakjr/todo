<script setup>
</script>

<template>
  <Layout sidebar="sobre">
    <Head title="Sobre o Volt"/>

    <PageInfo
      pageIcon="fa fa-bolt"
      pageTitle="Sobre o Volt"
    >
    </PageInfo>

    <div class="container-fluid pt-2">

      <div class="box box-primary">

        <div class="box-header with-border d-flex justify-content-center">
          <h4>
            Volt é um starter kit composto por: Laravel (backend), Vue.js (frontend) e Inertia.js
          </h4>
        </div>

        <div class="box-body px-5 py-3">
          <p>
            O uso do Vue.js como frontend, em substituição ao modelo tradicional onde o servidor compila e envia uma página HTML completa ao cliente,
            veio da necessidade da criação de aplicações web extremamente responsivas permitindo assim uma melhor "experiência do usuário".
          </p>

          <p>
            Isto significa criar uma Single Page Application (SPA).
          </p>

          <p>
            O problema atual com as SPAs é a complexidade envolvida: É necessário a duplicação de tarefas tanto no frontend quanto no backend: rotas, validações, autorizações, etc.
          </p>

          <p>
            Para a criação de uma SPA é necessário, na verdade, a criação de duas aplicações: um frontend e um backend.
            Logo, o esforço necessário é duplo.
          </p>

          <p>
            A comunidade logo percebeu o fardo extra e a perde de produtividade. Também é notado que nem todas as aplicações necessitam ser escritas utilizando esta arquitetura.
          </p>

          <p>
            Soluções como pjax, turbolink, livewire e outras, conhecidas como
            <i>partial reloads</i>, surgiram para oferer uma maior UX sem a complexidade do uso de APIs.
            Um exemplo clássico do uso desta técnica são as aplicações github e gitlab.
          </p>

          <p>
            É aqui que se faz uso do Inertia.js.<br>
            Esta solução é uma "cola" que conecta o frontend e o backend:
          </p>

          <p class="p-3 text-italic">
            Inertia is a new approach to building classic server-driven web apps. We call it the modern monolith.<br>
            Inertia allows you to create fully client-side rendered, single-page apps, without much of the complexity that comes with modern SPAs.<br>
            It does this by leveraging existing server-side frameworks.<br>
            Inertia has no client-side routing, nor does it require an API. Simply build controllers and page views like you've always done!
          </p>

          <p>
            Isto permite algo incrível:<br>
            Utilizar todo o poder de um framework javascript (Vue.js) apenas na camada
            <i>view</i>, para a criação da interface com o usuário e deixar todas as demais camadas para o backend (Laravel).
          </p>
          <p>
            Como o próprio site do vue.js <a href="https://vuejs.org/guide/introduction.html#what-is-vue">explica</a>:
          </p>
          <p class="p-3 text-italic">
            What is Vue?
            Vue (pronounced /vjuː/, like view) is a JavaScript framework for <b>building user interfaces</b>.
          </p>

          <p>
            Ao final, teremos apenas uma única aplicação: "um monolítico moderno".<br>
            Um monolítico com a UX de uma SPA e com a produtividade de uma aplicação full backend.
          </p>

          <div>
            Sendo um starter kit, Volt fornece uma maneira fácil para o desenvolvedor utilizar os seguintes componentes necessários em qualquer aplicação web:
            <ul>
              <li>Títulos da aplicação</li>
              <li>Menus</li>
              <li>Atalhos</li>
              <li>Breadcumbs</li>
              <li>Mensagens</li>
              <li>Informações sobre a Página</li>
              <li>Filtros</li>
              <li>Paginações</li>
            </ul>
          </div>

          <p>
            Esta página é um exemplo de uma aplicação Vue.js + Inertia.js + Laravel<br>
            Acesse o menu
            <Link :href="route('volts.index')">"Volts"</Link>
            ao lado e verifique como a página não sofre um full reload.<br>
            Este menu contém um CRUD de um objeto genérico chamado "volt".<br>
            Faça um teste: Acesse a listagem, altere a paginação, realize uma busca utilizando os filtros, ordene as colunas, altere a estrela e status diretamente no listagem.<br>
          </p>

          <p>
            Perceba como a aplicação é responsiva, extremamente rápida e agradável de ser utilizada.
          </p>

          <p>
            Outras tecnologias utilizadas no Volt são: Bootstrap, fontawesome, Sass, Npm
          </p>

          <div>
            Espero que esta seja uma alternativa viável para a construção, de forma efeciente e produtividade, de SPAs.<br>
            Lembrando que muitas coisas ainda precisam ser feitas:
            <ul>
              <li> Utilização da Central de Segurança</li>
              <li> Componente MultiSelect</li>
              <li> Componente Upload de arquivos</li>
              <li> .</li>
              <li> .</li>
              <li> .</li>
              <li> .</li>
            </ul>
          </div>

          <!--
          <div class="alert alert-warning">
            Podemos utilizar????? <b>Não 😔 .</b> Nossa infra-estrutura (Jenkins) utiliza o Node.js versão 10.<br>
            Para utilizarmos esta tecnologia (em Laravel) precisamos do Node.js 12.<br>
            Espero que logo atualizem 🙏🙏🙏
          </div>-->

          <div>
            Aceitamos críticas e <i>Pull Requests</i> !!<br>
            <a href="http://gitlab.celepar.parana/gcgit-volt/volt" target="_blank">Gitlab do projeto</a>
          </div>

          <p>
            <br>
            Obrigado.<br>
            João Alfredo (jakjr@celepar.pr.gov.br)
          </p>

        </div>
      </div>

    </div>
  </Layout>
</template>

