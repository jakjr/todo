<template>
    <PageInfo
        pageTitle="Exemplo de um formulário"
        pageIcon="fa fa-keyboard-o"
        inertiaBack="/page1"
    >
    </PageInfo>

    <div class="container-fluid pt-2">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Título</h3>
            </div>

            <div class="box-body">
                <form @submit.prevent="submit">

                    <div class="mb-3 form-floating">
                        <input :class="['form-control', form.errors.name ? 'is-invalid' : '']" id="name"
                               v-model="form.name" placeholder="Name">
                        <label for="name" :class="['form-text', form.errors.name ? 'text-danger': '']">Name:</label>
                        <div class="invalid-feedback" v-if="form.errors.name">{{ form.errors.name }}</div>
                        <div class="feedback" v-else>Your name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" :class="['form-text', form.errors.email ? 'text-danger' : '']">Email address</label>
                        <input id="email" :class="['form-control', form.errors.email ? 'is-invalid' : '']" v-model="form.email">
                        <div class="invalid-feedback" v-if="form.errors.email">{{ form.errors.email }}</div>
                        <div class="feedback" v-else>Your email.</div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" v-model="form.remember">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>

                    <button type="submit" :disabled="form.processing" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
    import Layout from '@/Layout/Base'
    import {Link, useForm} from '@inertiajs/inertia-vue3'
    import PageInfo from '@/Layout/PageInfo'

    export default {
        metaInfo: {title: 'Form'},
        layout: Layout,
        components: {
            Link, PageInfo
        },
        setup() {
            const form = useForm({
                name: null,
                email: null,
                remember: false,
            })

            function submit() {
                form.post('/form', {
                    preserveScroll: true,
                    onSuccess: () => form.reset(),
                })
            }

            return {form, submit}
        }
    }
</script>
