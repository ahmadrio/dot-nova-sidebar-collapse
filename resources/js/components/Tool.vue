<template>
    <div>
        <a href="#" class="flex items-center font-normal text-white mb-6 text-base no-underline" @click.prevent="toggle">
            <span v-html="headerIcon"></span>
            <span class="sidebar-label">{{ header }}</span>
        </a>

        <transition-group tag="ul" class="list-reset" :class="{'mb-6': last }">
            <slot v-if="expanded"></slot>
        </transition-group>
    </div>
</template>

<script>
    export default {
        props: {
            header: String,
            last: Boolean,
            resourcesUri: Object,
            headerIcon: String,
        },

        data() {
            return {
                expanded: false,
                resourceUriKeys: JSON.parse(this.$props.resourcesUri),
            }
        },

        methods: {
            toggle() {
                this.expanded = !this.expanded;
            }
        },

        mounted() {
            for (let i = 0; i < this.resourceUriKeys.length; i++) {
                if (this.resourceUriKeys[i]) {
                    this.expanded = true;
                }
            }
        }
    }
</script>
