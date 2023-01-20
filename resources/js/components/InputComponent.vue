<template>
    <section>
        <div>
            <label>{{ title }}</label>
        </div>
        <div v-if="required === true">
            <input :type="type" :title="name" :name="name" :style="'width: ' + width + ';'" :value="default_value"
                   autocomplete="off" :step="step" required>
        </div>
        <div v-else>
            <input :type="type" :title="name" :name="name" :style="'width: ' + width + ';'" :value="default_value"
                   autocomplete="off" :step="step">
        </div>
    </section>
</template>

<script>
export default {
    name: 'input',
    props: {
        title: {
            required: true
        },
        name: {
            required: true
        },
        width: {
            required: true
        },
        default_value: {
            default: "",
            required: false
        },
        type: {
            default: "text",
            required: false
        },
        step: {
            default: "",
            required: false
        },
        required: {
            default: true,
            required: false
        },
    }
}
</script>

<style scoped>
* {
    font-family: "Roboto Thin", "Comic Sans MS", sans-serif;
    font-size: 18px;
    padding: 1px;
}

label {
    color: #9DB17C;
    margin-left: 10px;
}

input {
    background-color: #FFF;
    border: rgba(177, 197, 144, 1) 2px solid;
    border-radius: 5px;
    height: 40px;
    text-align: center;
}

input:focus {
    outline: none;
    border: rgba(157, 177, 124, 1) 2px solid;
}
</style>
