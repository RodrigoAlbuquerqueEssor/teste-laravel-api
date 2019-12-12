<template>
<v-app id="admin">
    <v-navigation-drawer v-model="drawer" app clipped>
        <v-list dense>
            <v-list-item v-for="item in items" :key="item.text" @click="pushLink(item.link)">
                <v-list-item-action>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title>
                        {{ item.text }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-subheader class="mt-4 grey--text text--darken-1 "> CLIENTES </v-subheader>
            <v-list>
                <v-list-item v-for="item in items2" :key="item.text" @click="">
                    <v-list-item-avatar>
                        <img :src="`https://randomuser.me/api/portraits/men/${item.picture}.jpg`" alt="">
                    </v-list-item-avatar>
                    <v-list-item-title v-text="item.text"></v-list-item-title>
                </v-list-item>
            </v-list>
            <v-list-item class="mt-4" @click="">
                <v-list-item-action>
                    <v-icon color="grey darken-1">mdi-plus-circle-outline</v-icon>
                </v-list-item-action>
                <v-list-item-title class="grey--text text--darken-1"> Maiores Informações </v-list-item-title>
            </v-list-item>
            <v-list-item @click="">
                <v-list-item-action>
                    <v-icon color="grey darken-1">mdi-settings</v-icon>
                </v-list-item-action>
                <v-list-item-title class="grey--text text--darken-1"> Configuração </v-list-item-title>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>

    <v-app-bar app clipped-left color="blue darken-3">
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title class="mr-12 align-center">
            <span class="title"> Seguros Admin </span>
        </v-toolbar-title>
        <v-row align="center" style="max-width: 650px">
            <v-text-field :append-icon-cb="() => {}" placeholder="Search..." single-line append-icon="search" color="white" hide-details></v-text-field>
        </v-row>
        <div class="flex-grow-1"></div>
        <v-btn icon @click="changeTheme">
            <v-icon v-if="this.$vuetify.theme.dark == false">brightness_3</v-icon>
            <v-icon v-else>wb_sunny</v-icon>
        </v-btn>
        <v-menu left bottom offset-y>
            <template v-slot:activator="{ on }">
                <v-btn icon v-on="on">
                    <v-avatar size="32px">
                        <img src="/images/cris.png" alt="alt">
                    </v-avatar>
                </v-btn>
            </template>
            <v-list>
                <v-list-item link>
                    <v-list-item-avatar>
                        <img src="/images/cris.png" alt="">
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title class="title">Cristina Dias</v-list-item-title>
                        <v-list-item-subtitle>crisgit@github.com</v-list-item-subtitle>
                    </v-list-item-content>

                    <v-list-item-action>
                        <v-icon class='red--text'>favorite</v-icon>
                    </v-list-item-action>
                </v-list-item>
            </v-list>
            <v-divider></v-divider>
            <v-list nav dense>
                <v-list-item-group color="primary">
                    <v-list-item v-for="item in items" :key="item.key" @click="pushLink(item.link)">
                        <v-list-item-icon>
                            <v-icon>{{ item.icon}}</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>{{ item.text }}</v-list-item-title>
                    </v-list-item>
                    <v-divider></v-divider>
                    <v-list-item @click="logout">
                        <v-list-item-icon>
                            <v-icon color="red">exit_to_app</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title> Sair </v-list-item-title>
                    </v-list-item>
                </v-list-item-group>
            </v-list>

        </v-menu>
    </v-app-bar>

    <v-content>
        <v-container grid-list-xs>

            <router-view></router-view>
        </v-container>
    </v-content>
</v-app>
</template>


<script>
export default {
    name: 'main-app',
    props: {
        source: String,
    },
    data: () => ({
        drawer: null,
        items: [{
                icon: 'dashboard',
                text: 'Home',
                link: '/admin/home'
            },
            {
                icon: 'folder',
                text: 'Arquivos',
                link: ''
            },
            {
                icon: 'description',
                text: 'Blog',
                link: '/admin/posts'
            },
            {
                icon: 'mdi-settings',
                text: 'Configurações',
                link: ''
            },
            {
                icon: 'history',
                text: 'Atualizações',
                link: ''
            },
        ],
        items2: [{
                picture: 28,
                text: 'Mario'
            },
            {
                picture: 38,
                text: 'José'
            },
            {
                picture: 48,
                text: 'Jesus'
            },
            {
                picture: 58,
                text: 'Carlos'
            },
            {
                picture: 78,
                text: 'Vader'
            },
        ],
    }),
    methods: {
        logout() {
            this.$store.commit('logout');
            this.$router.push('/admin/login');
        },
        changeTheme() {
            this.$vuetify.theme.dark = !this.$vuetify.theme.dark
        },
        pushLink(link) {
            this.$router.push(link)
        }
    },
    created() {
        this.$vuetify.theme.dark = true
    },
}
</script>

<style>
.theme--dark.v-application {
    background-image: url(/images/1.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    color: #fff;
}

.theme--dark.v-navigation-drawer {
    background-color: rgba(66, 66, 66, 0.6);
}

.theme--dark.v-card {
    background-color: rgba(66, 66, 66, .5);
    color: #fff;
}

.theme--dark.v-data-table {
    background-color: rgba(66, 66, 66, .5);
    color: #fff;
}
</style>

