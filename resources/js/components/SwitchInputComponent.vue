<template>
    <section>
        <label :for="name">{{ title }}</label>
        <div class="">
            <div :class="input_data === false ? 'no active' : 'no inactive'" @click="toggleToInactive">Não</div>
            <div :class="input_data === true ? 'yes active' : 'yes inactive'" @click="toggleToActive">Sim</div>
        </div>

        <input type="hidden" :value="input_data" :name="name">
    </section>
</template>

<script>

export default {
    props: {
        prop_value: {
            type: Boolean,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            input_data: {
                type: Boolean,
                default: false
            }
        }
    },
    mounted() {
        this.input_data = this.prop_value;
    },
    methods: {
        toggleToActive() {
            if (this.input_data === false) {
                this.input_data = true;
            }
        },
        toggleToInactive() {
            if (this.input_data === true) {
                this.input_data = false;
            }
        }
    }
};
</script>

<style scoped>

* {
    font-family: "Roboto Thin", "Comic Sans MS", sans-serif;
    font-size: 18px;
    padding: 2px;
    box-sizing: border-box;
}

label {
    color: #9DB17C;
    margin-left: 10px;
}

div {
    justify-content: center;
    align-items: center;
    display: flex;
    text-align: center;
    width: 150px;
    height: 40px;
}

.active {
    background-color: #FFF !important;
    color: rgba(157, 177, 124, 1);
}

.inactive {
    background-color: rgba(229, 229, 229, 1) !important;
    color: rgba(157, 177, 124, .6);
    cursor: pointer;
}

.no {
    width: 75px;
    height: 40px;
    border-radius: 5px 0 0 5px;
    border-color: rgba(177, 197, 144, 1);
    border-style: solid;
    border-width: 2px 0 2px 2px;
    padding: 0;
}

.yes {
    width: 75px;
    height: 40px;
    border-radius: 0 5px 5px 0;
    border: rgba(177, 197, 144, 1) 2px solid;
    padding: 0;
}
</style>
