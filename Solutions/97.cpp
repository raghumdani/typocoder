#include<iostream>
using namespace std;
int  main()
{
int i,j,t,count=0;
int a[100001] = {0};
a[1]=1;
for(i=2;i<=100001/2;++i)
for(j=2;j*i<=100001;++j)
a[j*i]=1;
cin>>t;
while(t--)
{
cin>>j;
for(i=1;i<=j;++i)
if(a[i]==0)
++count;

cout<<count<<endl;
}
return 0;
}
