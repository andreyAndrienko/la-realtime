<template>
    <div class="container">
        <div class="row">
            <div class="col p-4">
                <ul class="list-group">
                    <li class="list-group-item mb-4" v-for="message in messages">
                        <pre v-text="message"></pre>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row p-4">
            <div class="col-8 mx-auto">
                <input type="text" class="input-group form-control"
                       @keyup.enter="sendMessage"
                       v-model="message">
            </div>
            <div class="col-4">
                <button class="btn btn-lg btn-success" @click="sendMessage">
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
                message:  '',
                messages: []
            }
        },
        created() {
            Echo
                .channel('messages')
                .listen('ChatMessage', this.addMessage);
        },
        methods: {
            async sendMessage() {
                if (this.message.trim().length === 0) return;

                try {
                    await axios.post('/message', {message: this.message});
                } catch (e) {
                    this.$toaster.error('Error');
                }

                this.message = '';
            },
            addMessage({message}) {
                this.messages.push(message);

                this.$toaster.info(message.message)
            }
        }
    }
</script>
