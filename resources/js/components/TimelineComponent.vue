
<template>
    <div class="col-md-7 posts">
        <input type="search" v-model="search" placeholder="Serach..">
        <p v-if="!posts.length">No posts</p>
        <div class="media" v-for="post in filtredTweet" :key="post.id">
            <div class="tw">
                <div class="tweet">
                    <img :src="'storage/' + post.user.image" alt="" class="rounded-circle">
                   
                </div>
                <div class="para">
                <a :href="post.user.profileLink">{{ post.user.name }}</a> <span>{{ post.createdDate }}</span> 
                <p>{{ post.body }}</p>
                <hr>
                </div>
            </div>  
        </div>
      
    </div>
</template>
<style scoped>
    .posts{
         background-color: white;
         margin-top: 13px;
         margin-bottom: -25px;
        padding-bottom: 2px;
    }
    .media .tw{
        display: flex;
        margin-bottom: 21px;
         margin-top: 13px;

    }
     .media .para{
      margin-left: 25px;
      margin-bottom: -6px;
    }
   .media .tweet{
       margin-left: 10px;
   }
     .media .tweet img{
       height: 65px;
       width: 65px;
   }
     .media .tw .para a{
        text-decoration: none;
        color: black;
        font-size: 16px;
        font-weight: bold;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
   }
    .media .tw .para p{
        font-size: 14px;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    }
      .media .tw .para hr{
        position: absolute;
        left: 0;
        width: 665px;
    }
     .media .tw .para span{
           font-size: 12px;
            margin-left: 5px;
            color: gray;
            font-weight: bold;
    }
    .posts input{
    position: absolute;
    top: -81px;
    right: 44px;
    border-radius: 30px;
    outline-style: none;
    border: 1px solid #DDD;
    height: 35px;
    width: 190px;
    padding-left: 7px;
    background-color: aliceblue;
    }
</style>
<script>
import Event from '../event.js';

export default {
    data() {
        return {
            posts: [],
            post: {},
            search:'',
        }
    },
    mounted() {
          axios.get('/posts').then((resp => {
            this.posts = resp.data 
        }));
        Event.$on('added_tweet', (post) => {
            this.posts.unshift(post);
        });
    },
    computed:{
        filtredTweet:function(){
            return this.posts.filter((post) => {
             return post.body.match(this.search)
            });
        }
    }
}
</script>