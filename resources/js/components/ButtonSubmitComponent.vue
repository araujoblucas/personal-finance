<template>
    <section>
        <button class="submit_button" type="submit" :style="'width: ' + width + ';'">{{ text }}</button>
    </section>
</template>

<script>

export default {
    props: {
        width: {
            required: true
        },
        text: {
            required: false,
            default: "Criar"
        }
    },
    data() {
        return {
            input_data: {
                type: Boolean,
                default: false
            }
        }
    }
};
</script>

<style scoped>

* {
    font-family: "Roboto", "Roboto Light", sans-serif;
    font-size: 18px;
    padding: 1px;
    color:white;
}

.submit_button {
    text-transform: uppercase;
    background-color: #9DB17C;
    margin-top: 33px;
    margin-left: 10px;
    border: none;
    border-radius: 5px;
    height: 40px;
    text-align: center;
}

div {
    justify-content: center;
    align-items: center;
    display: flex;
    text-align: center;
    width: 150px;
    height: 40px;
}
</style>
