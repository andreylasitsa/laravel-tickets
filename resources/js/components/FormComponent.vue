<template>
    <div id="form">
        <p id="response"></p>
        <input type="text" name="title" placeholder="enter a title" id="title">
        <br>
        <textarea name="text" placeholder="enter a text" id="text"></textarea>
        <br>
        <button id="button" @click="sendData()">Save</button>
        <br>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            sendDataUrl: '/addTicket'
        }
    },
    mounted() {
        console.log(process.env.APP_URL)
    },
    methods: {
        sendData() {
            let title = document.getElementById('title').value;
            let text = document.getElementById('text').value;
            axios.post(this.sendDataUrl, {title, text}).then(() => {
                this.flash('Success', 'black');
            }).catch(() => {
                this.flash('Error', '#c63030');
            })
        },
        flash(text, color) {
            let flash = document.getElementById('response');
            flash.style.visibility = 'visible';
            flash.innerText = text;
            flash.style.color = color;
            setTimeout(() => {
                document.getElementById('response').style.visibility = 'hidden';
            }, 5000);
        }
    }
}
</script>
<style lang="scss" scoped>
#form {
    padding-top: 200px;
    display: block;
    text-align: center;

    input, textarea {
        border-bottom: 1px solid black;
        margin-bottom: 20px;
        width: 400px;
        font-size: 16px;
    }

    input:focus, textarea:focus {
        outline: none;
    }

    button {
        margin-left: auto;
        margin-right: auto;
        font-size: 16px;
        padding: 10px 20px;
    }

    button:hover {
        color: white;
        background: #c63030;
    }

    #response {
        visibility: hidden;
        margin-bottom: 40px;
    }
}
</style>
