<template>

    <div>

        <div class="column is-9">
            <section class="hero is-info welcome is-small">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                           Hi ! Create new Article
                        </h1>
                        <h2 class="subtitle">
                            I hope you are having a great day!
                        </h2>
                    </div>
                </div>
            </section>


            <!-- message -->

            <article class="message is-success" :style="{display:style.display}">
                <div class="message-header">
                    <p>Success</p>
                    <button class="delete" aria-label="delete" @click="hide"></button>
                </div>
                <div class="message-body">
                    Your Article has been published successfully
                </div>
            </article>

            <!-- end message -->

            <form class="article" method="post">

                <input type="hidden" name="_token" id="csrf-token" :value="root.csrf_token" />

                <input class="input is-medium" name="title" v-model="slug" type="text" placeholder="Article Title" required>

                <div class="content">

                    <span class="icon has-text-info"><i class="fa fa-code-fork"></i></span>{{ root.Article }}/<span class="slug" v-if="slug != ''">{{ slug.split(' ').join('') }}</span>

                </div>

                <textarea class="textarea" required name="content" v-model="content" placeholder="Compose your Article now " rows="10"></textarea>

                <button @click.prevent="submitArticle" type="submit" class="button is-margin is-fullwidth">Submit</button>

            </form>


        </div>

    </div>

</template>

<script>
    export default {

        data(){

            return{

                root:window.laravel,

                content:'',

                slug:'',

                style:{

                    display:'none',

                }

            }

        },

        methods:{

            /*   submit article to server using axios   */

            submitArticle(){

                var data = this

                axios.post(this.root.ArticlePost, {

                    _token:data.root.csrf_token,
                    title:data.slug,
                    content:data.content,
                    slug:data.slug.split(' ').join('')


                }).then(function (response) {

                    data.content = ''

                    data.slug = ''

                    data.style.display = "block"

                }).catch(function (error) {

                    console.log(error.response)

                });

            },

            hide(){

                this.style.display = "none"

            }


        }

    }

</script>

<style scoped>

    .article{
        margin-top:15px;
    }

    .content{
        margin-top:15px;
    }

    .slug{

        margin-left:1px;
        padding:8px;
        background-color:#fdfd96;

    }

    .is-margin{
        margin-top:10px;
    }

    .message{
        margin-top:10px;
        margin-bottom:10px;
    }

</style>