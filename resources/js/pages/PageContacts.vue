<template>
    <div class="container d-flex">
        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
            <h2 class="mb-4">
                Contact us
            </h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat minus in saepe, iusto, excepturi qui earum nulla non vel assumenda quis inventore temporibus maiores voluptate mollitia laboriosam illum, suscipit pariatur!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat minus in saepe, iusto, excepturi qui earum nulla non vel assumenda quis inventore temporibus maiores voluptate mollitia laboriosam illum, suscipit pariatur!
            </p>
        </div>

        <form @submit.prevent="sendMail" class="row g-2 mx-3" novalidate>
            <div v-if="sendMessage" class="alert alert-success" role="alert">
                {{ sendMessage }}
            </div>
            <div v-if="failedMessage" class="alert alert-success" role="alert">
                {{ failedMessage }}
            </div>
            <!-- campo nome -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" :class="{'is-invalid' : warningError.name}" type="text" name="name" id="name" v-model="name">
                <div class="invalid-feedback">
                    <ul>
                        <li v-for="error in warningError.name" :key="error">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- campo email -->
            <div class="col-md-6 mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" :class="{'is-invalid' : warningError.email}" type="text" name="email" id="email" v-model="email">
                <div class="invalid-feedback">
                    <ul>
                        <li v-for="error in warningError.email" :key="error">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- campo message -->
            <div class="col-12 mb-3">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control" :class="{'is-invalid' : warningError.message}" name="message" id="message" cols="30" rows="10" v-model="message"></textarea>
                <div class="invalid-feedback">
                    <ul>
                        <li v-for="error in warningError.message" :key="error">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- spunta per la newsletter -->
            <div class="mb-3">
                <input class="form-check-input me-1" :class="{'is-invalid' : warningError.newsletter}" type="checkbox" name="newsletter" id="newsletter" v-model="mailinglist">
                <label class="form-check-label" for="newsletter">Iscrivimi alla newsletter</label>
                <div class="invalid-feedback">
                    <ul>
                        <li v-for="error in warningError.newsletter" :key="error">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- pulsante per l'invio del messaggio -->
            <button class="btn btn-primary col-4" type="submit" :disabled="sending">{{ sending ? 'Sending...' : 'Send' }}</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'PageContacts',
    data() {
        return {
            name: '',
            email: '',
            message: '',
            mailinglist: true,
            sendMessage: '',
            failedMessage: '',
            sending: false,
            warningError: {}
        }
    },
    methods: {
        sendMail() {
            this.sending = true;
            axios.post('/api/leads', {
                name: this.name,
                email: this.email,
                message: this.message,
                mailinglist: this.mailinglist
            })
                .then(response => {
                    if (response.data.success) {
                        this.resetForm();
                        this.sendMessage = response.data.response;
                    } else {
                        this.warningError = response.data.response;
                    }
                })
                .catch(error => this.warningError = 'Si è verificato un errore, riprovare')
                .finally(data => this.sending = false);
        },
        resetForm() {
            this.name = '',
            this.email = '',
            this.message = '',
            this.mailinglist = true
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
