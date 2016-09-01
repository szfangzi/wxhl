var HelloMessage = React.createClass({
    getInitialState:function(){
        return{
            opacity:1.0,
            fontSize:'12px'
        };
    },
    render: function() {
        return <div className={this.props.className} style=
            {{
                opacity:this.state.opacity,
                fontSize:this.state.fontSize
            }} >Hello {this.props.name}</div>;

    },
    componentWillMount:function(){
        console.log('componentWillMount');
        var self = this;
        window.setTimeout(function(){
            self.setState({
                opacity:0.5,
                fontSize:'44px'
            });
        }, 2000);
    },
    componentDidMount:function(){
        console.log('componentDidMount');
        //var self = this;
        //window.setTimeout(function(){
        //    self.setState({
        //        opacity:0.5,
        //        fontSize:'44px'
        //    });
        //}, 2000);
    }
});

ReactDOM.render(
<HelloMessage name="John" className="lalala" />,
    document.getElementById('container')
);
