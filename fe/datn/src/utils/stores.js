
import '../style/style.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import cuahang1 from "assets/users/imager/body/cuahang.jpg";
import cuahang2 from "assets/users/imager/body/cuahang1.jpg";
import cuahang3 from "assets/users/imager/body/cuahang2.jpg";

export const featStores = {
    hanoi: {
        title: "Hà Nội",
        stores: [
            { img: cuahang1, name: "Bemori Cầu Giấy", address: "104 - 106 Cầu Giấy" },
            { img: cuahang2, name: "Bemori Đống Đa", address: "1028 Đường Láng, Đống Đa" },
            { img: cuahang3, name: "Bemori Hai Bà Trưng", address: "275 Bạch Mai, Hai Bà Trưng" },
        ],
    },
    hochiminh: {
        title: "Hồ Chí minh",
        stores: [
            { img: cuahang1, name: "Bemori Quận 1", address: "123 Nguyễn Huệ, Quận 1" },
            { img: cuahang2, name: "Bemori Quận 3", address: "456 Võ Văn Tần, Quận 3" },
            { img: cuahang3, name: "Bemori Quận 10", address: "789 3/2, Quận 10" },
        ]
    }
}

export const renderFeaturedStores = (data) => {
    const tabList = [];
    const tabPanels = [];

    Object.keys(data).forEach((key, index) => {
        tabList.push(<Tab key={index}>{data[key].title}</Tab>);
        const tabPanel = [];
        data[key].stores.forEach((item, j) => {
            tabPanel.push(
                <div className="col-4" key={j}>
                    <div className="hinh1" style={{ backgroundImage: `url(${item.img})` }}></div>
                    <p className="store-name">{item.name}</p>
                    <p className="store-address">{item.address}</p>
                </div>)
        });
        tabPanels.push(tabPanel);
    });

    return (
        < Tabs >
            <TabList>{tabList}</TabList>
            {
                tabPanels.map((item, key) => (
                    <TabPanel key={key}>
                        <div className="row">
                            {item}
                        </div>
                    </TabPanel>
                ))
            }

        </Tabs >
    );
};