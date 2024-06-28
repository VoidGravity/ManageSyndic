// ProfileScreen
import React from 'react';
import { View, Text, Image } from 'react-native';
import { Colors } from '@/constants/Colors';
import Images from '@/constants/Images';

const ProfileScreen = () => {
  return (
    <View style={styles.screen}>
      <View style={styles.header}>
        <View>
          <Image style={styles.logo} source={Images.Logo} />
        </View>
        <View>
          <Text style={styles.title}>Profile</Text>
        </View>
      </View>
      <View style={styles.body}>
        <View>
          <Image style={styles.userPhoto} source={Images.AvatarMale} />
        </View>
        <View>
          <Text style={styles.userName}>John Doe</Text>
        </View>
      </View>
    </View>
  );
};

const styles: any = {
  screen: {
    backgroundColor: Colors.bodyBg,
    width: '100%',
    height: '100%',
  },
  logo: {
    width: 50,
    height: 60,
    maxHeight: '80%',
  },
  header: {
    backgroundColor: Colors.bodyBg,
    color: 'white',
    padding: 10,
    textAlign: 'center',
    with: '100%',
    display: 'flex',
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    height: 70,
    boxShadow: '0 0 10px rgba(0, 0, 0, 0.1)',
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
  body: {
    display: 'flex',
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  userPhoto: {
    width: 100,
    height: 100,
    borderRadius: 50,
    marginBottom: 10,
    borderWidth: 2,
    borderColor: Colors.bodyColor,
  },
  userName: {
    fontSize: 18,
    fontWeight: 'bold',
  },
};

export default ProfileScreen;