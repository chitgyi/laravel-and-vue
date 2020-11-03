<template>
  <v-container>
    <v-progress-circular
      v-if="loading"
      size="40"
      color="black"
      indeterminate
      id="indicator"
    />
    <v-row v-else>
      <v-col
        v-for="result in results"
        :key="result.id"
        id="article"
        cols="12"
        md="6"
        sm="6"
        xs="12"
        lg="4"
      >
        <v-card elevation="2">
          <v-card-title>
            {{ result.title }}
          </v-card-title>
          <v-card-subtitle>
            {{ result.user.name }}
          </v-card-subtitle>
          <v-card-text>
            {{ result.body }}
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<style  scoped>
#indicator {
  position: absolute;
  top: 50%;
  left: 50%;
}
</style>

<script>
export default {
  data() {
    return {
      loading: true,
      message: "Hello Vue",
      results: [],
      url: "/api/v1/articles?page=1",
    };
  },
  created() {
    this.fetchData();
  },
  mounted() {},
  methods: {
    fetchData() {
      this.$api.get(this.url).then((res) => {
        this.results = res.data.data;
        this.loading = false;
      });
    },
  },
};
</script>