function ajax(data) {
            $.ajax({
                type: data.type,
                url: data.url,
                data: {
                    data: data.data
                },
            })
        }
    