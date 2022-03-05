let actions = {

    /**
     *
     * @param commit
     * @param post
     */
    createPost({commit}, post) {
        axios.post('/api/posts', post)
            .then(res => {
                commit('CREATE_POST', res.data)
            }).catch(err => {
            console.log(err)
        })

    },

    /**
     *
     * @param commit
     */
    fetchDepartments({commit}) {
        axios.get(`/api/departments`)
            .then(res => {
                commit('FETCH_DEPARTMENTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     *
     * @param commit
     * @param department
     */
    fetchResources({commit}, department) {
        if(department){
            axios.get(`/api/${department}/resources`)
                .then(res => {
                    commit('FETCH_RESOURCES', res.data)
                }).catch(err => {
                console.log(err)
            })
        }
        else{
            axios.get(`/api/all/resources`)
                .then(res => {
                    commit('FETCH_RESOURCES', res.data)
                }).catch(err => {
                console.log(err)
            })
        }
    },

    /**
     *
     * @param commit
     * @param department
     */
    fetchTasks({commit}, department) {
        if(department){
            axios.get(`/api/${department}/tasks`)
                .then(res => {
                    commit('FETCH_TASKS', res.data)
                }).catch(err => {
                console.log(err)
            })
        }
        else{
            axios.get(`/api/all/tasks`)
                .then(res => {
                    commit('FETCH_TASKS', res.data)
                }).catch(err => {
                console.log(err)
            })
        }
    },

    /**
     *
     * @param commit
     */
    fetchDepartmentsUsers({commit}) {
        axios.get('/api/all/departments/users')
            .then(res => {
                commit('FETCH_DEPARTMENTS_USERS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     *
     * @param commit
     * @param userID
     * @param yearValue
     */
    fetchUserProjectsCount({commit}, {userID, yearValue}) {
        axios.get(`/api/${userID}/${yearValue}/projects/count`)
            .then(res => {
                commit('FETCH_USER_PROJECTS_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Get the Resources created by the user and count it
     * @param commit
     * @param userID
     */
    fetchUserResourcesCount({commit}, {userID, yearValue}) {
        axios.get(`/api/${userID}/${yearValue}/resources/count`)
            .then(res => {
                commit('FETCH_USER_RESOURCES_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Get the Customers created by the user and count it
     * @param commit
     * @param userID
     */
    fetchUserCustomersCount({commit}, {userID, yearValue}) {
        axios.get(`/api/${userID}/${yearValue}/customers/count`)
            .then(res => {
                commit('FETCH_USER_CUSTOMERS_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Get the equipment created by the user and count it
     * @param commit
     * @param userID
     */
    fetchUserEquipmentCount({commit}, {userID, yearValue}) {
        axios.get(`/api/${userID}/${yearValue}/equipment/count`)
            .then(res => {
                commit('FETCH_USER_EQUIPMENT_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },


    /**
     *
     * @param commit
     */
    fetchPrimaryColorSimple({commit}) {
        axios.get('/api/colors/primary')
            .then(res => {
                commit('FETCH_COLORS_PRIMARY_SIMPLE', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    fetchSecondaryColorSimple({commit}) {
        axios.get('/api/colors/secondary')
            .then(res => {
                commit('FETCH_COLORS_SECONDARY_SIMPLE', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    fetchPrimaryColorHex({commit}) {
        axios.get('/api/colors/primary/hex')
            .then(res => {
                commit('FETCH_COLORS_PRIMARY_HEX', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    fetchSecondaryColorHex({commit}) {
        axios.get('/api/colors/secondary/hex')
            .then(res => {
                commit('FETCH_COLORS_SECONDARY_HEX', res.data)
            }).catch(err => {
            console.log(err)
        })
    },



    /**
     *
     * @param commit
     * @param post
     */
    deletePost({commit}, post) {
        axios.delete(`/api/posts/${post.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_POST', post)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions
