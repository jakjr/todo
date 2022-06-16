<template>
    <div>
        <PageInfo
                pageTitle="Edição de Solicitação de Agenda"
                pageIcon="fa fa-cogs"
                inertiaBack="/foo"
        >
        </PageInfo>

<!--        <div class="container-fluid">-->

<!--            <div class="row">-->

<!--                <div class="col-md-6 offset-md-3">-->

<!--                    <div class="box box-primary">-->
<!--                        <form @submit.prevent="submit">-->

<!--                            <div class="box-header with-border clearfix">-->
<!--                                <h3 class="box-title">-->
<!--                                    Title-->
<!--                                </h3>-->
<!--                            </div>-->

<!--                            <div class="box-body">-->

<!--                                <b-form-group-->
<!--                                        id="input-group-1"-->
<!--                                        label="Data:"-->
<!--                                        label-for="input-1"-->
<!--                                        description="Any importante message."-->
<!--                                >-->
<!--                                    <b-form-input-->
<!--                                            id="input-1"-->
<!--                                            v-model="form.somedata"-->
<!--                                            :state="errors.hasOwnProperty('somedata') ? false : null"-->
<!--                                            placeholder="Placeholder...."-->
<!--                                    ></b-form-input>-->

<!--                                    <b-form-invalid-feedback :state="errors.hasOwnProperty('somedata') ? false : null">-->
<!--                                        {{ errors.somedata }}-->
<!--                                    </b-form-invalid-feedback>-->

<!--                                    <div v-if="posted">-->
<!--                                        Posted data: {{ posted}}-->
<!--                                    </div>-->

<!--                                </b-form-group>-->

<!--                            </div>-->

<!--                            <div class="box-footer">-->
<!--                                <button class="btn btn-primary" type="submit">Submit</button>-->
<!--                            </div>-->

<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import PageInfo from "../Layout/PageInfo";
    import {Link} from '@inertiajs/inertia-vue3'

    export default {
        metaInfo: {title: 'Inertia About'},
        layout: Layout,
        components: {
            Link, PageInfo
        },
        props: {
            errors: Object,
            posted: String,
        },
        data() {
            return {
                form: {
                    somedata: ''
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/test', this.form)
            },
        },
    }
</script>
