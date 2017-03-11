#include<bits/stdc++.h>
using namespace std;
int arr[100005],n,count1=0;
int sum=0;
int func(int k,int i){
    if(i==k)
        return 0;
    if(arr[i]>arr[k])
        return 0;
    return (1+func(k,(i+1)%n));
}
int main()
{
    cin>>n;
    for(int i=0;i<n;++i){
        cin>>arr[i];
    }
    for(int i=0;i<n;++i){
        count1+=1+func(i,(i+1)%n);
    }
    cout<<count1;
}
