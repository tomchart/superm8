<template>
    <ais-instant-search :search-client="searchClient" index-name="omdb_info">
        <ais-search-box placeholder="Search contacts..."></ais-search-box>
    </ais-instant-search>
</template>

<script>
import algoliasearch from "algoliasearch/lite";
import InstantSearch from "vue-instantsearch/vue3/es";

export default {
    data() {
        return {
            searchClient: algoliasearch(
                process.env.MIX_ALGOLIA_APP_ID,
                process.env.MIX_ALGOLIA_SEARCH
            ),
        };
    },
};
</script>
