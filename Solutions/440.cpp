#include <stdio.h> 
 
int main() { 
    int n,s1=0,s2 = 0,v1=0,v2 =0,i,j;
    scanf("%d",&n);
    int a[n],z[n];
    for( i = 0;i<n;i++)
    {
    scanf("%d",&a[i]);
    z[i] = a[i];
    }
    for( i = 0;i<n-1;i++)
    {
        for( j =0;j<n-i-1;j++)
        {
            if(z[j]>z[j+1])
            {
                int t = z[j];
                z[j] = z[j+1];
                z[j+1] = t;
            }
        }
    }
    
    for(i = 0;i<n;i++)
    {
        v1=v2=0;
        for( j =0;j<i;j++)
        {
            v1+=a[j];
            v2+=z[j];
        }
       
        s1+=a[i]+v1;
        s2+=z[i]+v2;
    }
         
       
        printf("%d\n",s1-s2);
    
    return(0);
}