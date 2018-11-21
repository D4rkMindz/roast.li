<template>
    <div>
        <v-tabs slot="extension"
                v-model="tab"
                centered
                color="primary"
                slider-color="secondary">
            <v-tab :key="'hot'" :href="'#hot'">Hot</v-tab>
            <v-tab :key="'new'" :href="'#new'">New</v-tab>
        </v-tabs>

        <v-tabs-items>
            <v-tab-item :id="'hot'" :key="'hot'">
                <v-card flat>
                    <v-card-text><Hot /></v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item :id="'new'" :key="'new'">
                <v-card flat>
                    <v-card-text>New</v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </div>
</template>

<script>
import HelloWorld from "../components/HelloWorld";
import Hot from "../components/Hot";

export default {
  components: {
    HelloWorld,
    Hot
  }
};
</script>
