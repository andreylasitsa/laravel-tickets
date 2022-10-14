<template>
    <div id="form">
        <input type="text" name="title" placeholder="enter a title" id="title">
        <br>
        <textarea name="text" placeholder="enter a text" id="text"></textarea>
        <br>
        <button id="button">Save</button>
        <br>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
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
}
</style>
