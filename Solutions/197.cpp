#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;
#define LL long long
#define MOD 1000000007
#define LIMIT 1000000

int isC[LIMIT+10]={0};
void seive(){
    isC[0]=isC[1]=1;
    for(int i=2;i<=LIMIT;i++){
        if(isC[i]==0){
           for(int j=i+i;j<=LIMIT;j+=i)
              isC[j]=1;
        }
    }
}

int np[LIMIT+10]={0};
void pre(){
    for(int i=2;i<=LIMIT;i++){
        np[i]=np[i-1];
        if(isC[i]==0)np[i]++;
    }
}


int main() {
    seive();
    pre();
    int t;
    cin>>t;
    while(t--){
        int n;
        cin>>n;
        cout<<np[n]<<endl;
    }
  return 0;
}
