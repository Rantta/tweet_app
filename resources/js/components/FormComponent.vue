<template>
    <div class="col-md-8">
        <form @submit.prevent="saveTweet">
            <div class="form-group">
                <textarea
                    class="form-control" 
                    rows="6" cols="8" 
                    placeholder="What's On Your Mind?"
                    maxlength="500"
                    v-model="body"
                    required>
                </textarea>
            </div>
            <div class="form-group">
               <button class="btn btn-primary" @click="buttRed">Tweet</button> 
            </div>
        </form>        
    </div>
</template>
<style scoped>
textarea{
    border: 1px solid #bda9a9;
    padding-left: 14px;
    padding-top: 10px;
}
button{
    position: relative;
    left: 651px;
    border-radius: 40px;
    width: 77px;
    height: 31px;
    line-height: 1;
}
</style>

<script>
import Event from '../event.js';
export default {
    data() {
        return {
            body: '',
             postData: {}
        }
    },
    methods: {
      saveTweet() {
            axios.post('/tweet/save', {body: this.body}).then(res => {
                this.postData = res.data;
                Event.$emit('added_tweet', this.postData);
            }).catch(e => {
                console.log(e);
            });
            this.body = '';
        },
        buttRed() {
            if(this.body !== ''){
                window.location.href = "/home";
            }
              
        }
    }
}
</script>