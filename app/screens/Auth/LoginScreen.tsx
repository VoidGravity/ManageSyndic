// login screen

import React, { useState } from "react";
import { View, Text, StyleSheet, Image, ImageBackground } from "react-native";
import { Link, useNavigation } from "@react-navigation/native";
import TextInputField from "@/app/components/TextInputField";
import ButtonField from "@/app/components/ButtonField";
import CheckBoxInputField from "@/app/components/CheckBoxInputField";
import { Colors } from "@/constants/Colors";
import Images from "@/constants/Images";

const LoginScreen = () => {
  const navigation = useNavigation();

  // FORM DATA
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [remember, setRemember] = useState(false);


  const handleLogin = () => {
    const data = {
      email,
      password,
      remember
    };
    console.log(data);
    navigation.navigate("Dashboard" as never);
  };

  return (
    <View style={styles.container}>
      <ImageBackground source={Images.bodyBG} resizeMode="cover" style={styles.image} imageStyle={{opacity:0.05}}>
      {/* Logo image */}
      <Image
        source={Images.LogoLight}
        style={{ width: 150, height: 150 }}
      />
      <Text style={{ color: Colors.bodyColor, fontSize: 20, marginBottom: 20 }}>
        Login
      </Text>
      <TextInputField placeholder="Enter email" label="Email" value={email} onChangeText={setEmail} />
      <TextInputField placeholder="Enter password" label="Password" type="password" value={password} onChangeText={setPassword} />
      <CheckBoxInputField label="Remember me" isChecked={true} onChange={setRemember}/>
      <Link style={{ 
        color: Colors.linkColor,
        textAlign: "right",
        width: "100%",
        paddingHorizontal: 10,
        marginVertical: 10,
        marginTop: 10 }} to="/ForgotPassword">
        <Text>Forgot Password?</Text>
      </Link>
      <ButtonField name="Login" onClick={handleLogin} />
      
      <View style={{ flexDirection: "row", marginTop: 20 }}>
        <Text style={{ color: Colors.bodyColor }}>Don't have an account?</Text>
        {/* <Link style={{ color: Colors.linkColor, marginLeft: 5 }} to="/"> */}
          <Text style={{
            color: Colors.linkColor,
            marginLeft: 5,
            textDecorationLine: "underline",
            fontWeight: "bold",
          }}>Request an account</Text>
        {/* </Link> */}
      </View>
      </ImageBackground>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
  image: {
    justifyContent: "center",
    alignItems: "center",
    paddingHorizontal: 20,
    backgroundColor: Colors.bodyBg,
    flex: 1,
    height: "100%",
  },
});

export default LoginScreen;
