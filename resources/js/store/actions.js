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
     * Project User Contribution Year
     * @param commit
     * @param userID
     * @param yearValue
     */
    fetchUserContributionYearProjectsCount({commit}, {userID, yearValue}) {
        axios.post(`/api/contribution/projects/year/count`,{
            user: userID,
            year: yearValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_PROJECTS_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Project User Contribution Month
     * @param commit
     * @param userID
     * @param yearValue,monthValue
     */
    fetchUserContributionMonthProjectsCount({commit}, {userID, yearValue, monthValue}) {
        axios.post(`/api/contribution/projects/month/count`,{
            user: userID,
            year: yearValue,
            month: monthValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_PROJECTS_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Project User Contribution Day
     * @param commit
     * @param userID
     * @param yearValue
     * @param monthValue
     * @param dayValue
     */
    fetchUserContributionDayProjectsCount({commit}, {userID, yearValue, monthValue, dayValue}) {
        axios.post(`/api/contribution/projects/day/count`,{
            user: userID,
            year: yearValue,
            month: monthValue,
            day: dayValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_PROJECTS_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Resources User Contribution Year
     * @param commit
     * @param userID
     * @param yearValue
     */
    fetchUserContributionYearResourcesCount({commit}, {userID, yearValue}) {
        axios.post(`/api/contribution/resources/year/count`,{
            user: userID,
            year: yearValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_RESOURCES_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Resources User Contribution Month
     * @param commit
     * @param userID
     * @param yearValue
     * @param monthValue
     */
    fetchUserContributionMonthResourcesCount({commit}, {userID, yearValue, monthValue}) {
        axios.post(`/api/contribution/resources/month/count`,{
            user: userID,
            year: yearValue,
            month: monthValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_RESOURCES_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Resources User Contribution Day
     * @param commit
     * @param userID
     * @param yearValue
     * @param monthValue
     * @param dayValue
     */
    fetchUserContributionDayResourcesCount({commit}, {userID, yearValue, monthValue, dayValue}) {
        axios.post(`/api/contribution/resources/day/count`,{
            user: userID,
            year: yearValue,
            month: monthValue,
            day: dayValue

        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_RESOURCES_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Equipment User Contribution Year
     * @param commit
     * @param userID
     * @param yearValue
     */
    fetchUserContributionYearEquipmentCount({commit}, {userID, yearValue}) {
        axios.post(`/api/contribution/equipment/year/count`,{
            user: userID,
            year: yearValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_EQUIPMENT_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Resources User Contribution Month
     * @param commit
     * @param userID
     * @param yearValue
     * @param monthValue
     */
    fetchUserContributionMonthEquipmentCount({commit}, {userID, yearValue, monthValue}) {
        axios.post(`/api/contribution/equipment/month/count`,{
            user: userID,
            year: yearValue,
            month: monthValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_EQUIPMENT_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Equipment User Contribution Day
     * @param commit
     * @param userID
     * @param yearValue
     * @param monthValue
     * @param dayValue
     */
    fetchUserContributionDayEquipmentCount({commit}, {userID, yearValue, monthValue, dayValue}) {
        axios.post(`/api/contribution/equipment/day/count`,{
            user: userID,
            year: yearValue,
            month: monthValue,
            day: dayValue

        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_EQUIPMENT_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Customers User Contribution Year
     * @param commit
     * @param userID
     * @param yearValue
     */
    fetchUserContributionYearCustomersCount({commit}, {userID, yearValue}) {
        axios.post(`/api/contribution/customers/year/count`,{
            user: userID,
            year: yearValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_CUSTOMERS_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Customers User Contribution Month
     * @param commit
     * @param userID
     * @param yearValue
     * @param monthValue
     */
    fetchUserContributionMonthCustomersCount({commit}, {userID, yearValue, monthValue}) {
        axios.post(`/api/contribution/customers/month/count`,{
            user: userID,
            year: yearValue,
            month: monthValue
        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_CUSTOMERS_COUNT', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    /**
     * Equipment User Contribution Day
     * @param commit
     * @param userID
     * @param yearValue
     * @param monthValue
     * @param dayValue
     */
    fetchUserContributionDayCustomersCount({commit}, {userID, yearValue, monthValue, dayValue}) {
        axios.post(`/api/contribution/customers/day/count`,{
            user: userID,
            year: yearValue,
            month: monthValue,
            day: dayValue

        })
            .then(res => {
                commit('FETCH_USER_CONTRIBUTION_CUSTOMERS_COUNT', res.data)
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
