<template>
    <div>
        <select id="tags" v-model="selected">
            <option v-for="tag in optionTags" :key="tag.id" :value="tag.id">
                {{ tag.name }}
            </option>
        </select>
        <button v-on:click.prevent="add_item">Add</button>
        <div v-for="item in addedTags" :key="item.id" class="flex justify-between w-full mb-2 items-center">
            <p>{{ item.name }}</p>
            <a class="block bg-red-600 hover:bg-red-400 text-gray-100 p-1 rounded text-center" @click="removeItem(item.id)">X</a>
        </div>
        <input type="hidden" :value="ids" name="tag_ids">
    </div>
</template>

<script>
export default {
    props: ["tags", "editTags"],
    data() {
        return {
            selected: '',
            addedTags: []
        }
    },
    methods: {
        add_item(e) {
            const item = this.tags.filter(v => v.id === Number(this.selected))[0]
            if(!this.addedTags.includes(item)) {
                this.addedTags.push(item).sort((a, b) => {
                    if (a.name < b.name) return -1
                    if (a.name > b.name) return 1
                    return 0
                })
            }
        },
        removeItem(id) {
            this.addedTags = this.addedTags.filter(v => v.id !== id)
        }
    },
    mounted() {
        const ids = this.editTags.map(v => v.id);
        this.addedTags = this.tags.filter(v => ids.includes(v.id));
    },
    computed: {
        ids() {
            return this.addedTags.map(v => v.id).sort((a,b) => {
                if (a < b) return -1
                if (a > b) return 1
                return 0
            }).toString();
        },
        optionTags() {
            return this.tags.filter(v => !this.addedTags.includes(v));
        }
    }
}
</script>
