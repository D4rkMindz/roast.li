<template>
    <!--  <v-app>
        <v-toolbar app>
          <v-toolbar-title class="headline text-uppercase">
            <span>Vuetify</span>
            <span class="font-weight-light">MATERIAL DESIGN</span>
          </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn
            flat
            href="https://github.com/vuetifyjs/vuetify/releases/latest"
            target="_blank"
          >
            <span class="mr-2">Latest Release</span>
            <v-icon>mdi-open-in-new</v-icon>
          </v-btn>
        </v-toolbar>

        <v-content>
          <router-view/>
        </v-content>
      </v-app>-->

    <div>
        <v-app>
            <v-toolbar
                    color="cyan"
                    dark
                    tabs>
                <v-toolbar-side-icon></v-toolbar-side-icon>

                <v-toolbar-title>{{name}}</v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon>
                    <v-icon>search</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>more_vert</v-icon>
                </v-btn>

            </v-toolbar>
            <router-view></router-view>
        </v-app>
    </div>

</template>

<script>
export default {
  name: "App",
  data() {
    return {
      //
    };
  }
};
</script>
