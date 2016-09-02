//var List = React.createClass({
//    getInitialState: function () {
//        return {
//            msg:[1,2,3,4]
//        }
//    },
//    render: function () {
//        var messages = [];
//        this.state.msg.forEach(function (msg, index) {
//            messages.push(<Item msg={msg} key={index} />);
//        });
//        return (
//            <div>
//                {messages}
//            </div>
//        );
//    }
//});
//
//var Item = React.createClass({
//    getDefaultProps: function () {
//        return {
//            messages:['default']
//        }
//    },
//    render: function () {
//
//        return (
//            <div>{this.props.msg}</div>
//        );
//    }
//});
//
//ReactDOM.render(
//    <List title="asdasdasd" />,
//    document.querySelector('#container')
//);


var Form = React.createClass({
    getInitialState: function () {
        return {
            inputValue: 'inputValue',
            selectValue: 'select',
            radioValue: 'radio',
            textareaValue: 'textarea',
            checkValues:['C']
        }
    },
    shouldComponentUpdate: function(nextP, nextS){
        console.log(nextP, nextS);
    },
    handleRadio: function (e) {
        this.setState({
            radioValue:e.target.value
        });
    },
    handleCheckbox: function (e) {
        var checkValues = this.state.checkValues;
        var newVal = e.target.value;
        var index = checkValues.indexOf(newVal);
        if (index == -1) {
            checkValues.push( newVal );
        } else {
            checkValues.splice(index, 1);
        }
        this.setState({
            checkValues:checkValues
        });
    },
    handleSubmit: function (e) {
        e.preventDefault();
        var formData = {
            input:this.refs.rInput.value,
            select:this.refs.rSelect.value,
            textarea:this.refs.rTextarea.value,
            radio:this.state.radioValue,
            check:this.state.checkValues
        };
        console.log(formData);this.refs.rRadio.test();
    },
    render: function () {
        return (
            <form onSubmit={this.handleSubmit}>
                <input ref="rInput" type="text" />
                <br/>
                <select ref="rSelect" defaultValue={this.state.selectValue}>
                    <option value="o1">o1</option>
                    <option value="o2">o2</option>
                    <option value="o3">o3</option>
                    <option value="o4">o4</option>
                    <option value="o5">o5</option>
                </select>
                <br/>
                <Radio handleRadio={this.handleRadio} />
                <br/>
                <Check handleCheckbox={this.handleCheckbox} />
                <br/>
                <textarea ref="rTextarea" name="" id="" cols="30" rows="10" defaultValue={this.state.textareaValue} ></textarea>
                <button type="submit">submit</button>
            </form>
        );
    }
});

var Radio = React.createClass({
    render: function () {
        return (
            <div>
                <input type="radio" name="ra" value="A" onChange={this.props.handleRadio} />
                <input type="radio" name="ra" value="B" onChange={this.props.handleRadio} defaultChecked />
                <input type="radio" name="ra" value="C" onChange={this.props.handleRadio} />
            </div>
        );
    }
});

var Check = React.createClass({
    render: function () {
        return (
            <div>
                <input type="checkbox" name="cb" id="" value="A" onChange={this.props.handleCheckbox} />
                <input type="checkbox" name="cb" id="" value="B" onChange={this.props.handleCheckbox} />
                <input type="checkbox" name="cb" id="" value="C" onChange={this.props.handleCheckbox} defaultChecked />
            </div>
        );
    }
});


ReactDOM.render(
    <Form />,
    document.querySelector('#container')
);

