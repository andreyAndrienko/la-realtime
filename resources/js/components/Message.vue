<template>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <input type="text" class="input-group form-control" v-model="message">
            </div>
        </div>
        <div class="row p-5">
            <div class="col d-flex justify-content-center">
                <button class="btn btn-success" @click="sendMessage">
                    Отправить
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: 'w ewfwef '
            }
        },
        created() {
            Echo
                .channel('messages')
                .listen('ChatMessage', console.log)
        },
        methods: {
            sendMessage() {
                if (this.message.trim().length === 0) return;

                axios.post('/message', {
                    message: this.message
                })
            }
        }
    }
</script>
