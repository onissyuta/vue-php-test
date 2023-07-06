<script setup>
import { ref } from 'vue'

const name = ref("")
const message = ref("")
const serverData = ref("")
const api = "http://localhost:800/api/index.php";


fetchAllMessages();

function fetchAllMessages(){
    fetch(api)
    .then(
        r => r.json().then(json => {
          serverData.value = json;
        })
    )
    .catch(r => console.log("通信失敗" , r));
}

function submit() {
    fetch(api,
        {
            "method": "POST",
            "body": `name=${name.value}&message=${message.value}`,
            "headers": {
                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
            }
        }
    )
    .then(r => {
        fetchAllMessages();
        message.value = "";
    })
    .catch(r => console.log("通信失敗" , r));
}

function clearAll(){
    fetch(api,
        {
            "method": "DELETE"
        }
    )
    .then(r => fetchAllMessages())
    .catch(r => console.log("通信失敗" , r));
}
</script>

<template>
    <form @submit.prevent="submit">
        <input type="text" placeholder="名前" size="20" v-model="name">
        <input type="text" placeholder="本文" size="60" v-model="message">
        <button type="submit">送信</button>
    </form>
    <button type="button" @click="clearAll">Clear</button>
    <hr>
    <div v-for="e in serverData">
        {{e.name}}: {{e.message}}
    </div>
</template>

<style scoped>
</style>
